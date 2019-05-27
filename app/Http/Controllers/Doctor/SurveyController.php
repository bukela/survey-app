<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use App\Patient;
use Carbon\Carbon;
use App\Notification;
use App\SurveyAnswer;
use App\SurveyQuestion;
use App\RawSubmissionData;
use Illuminate\Http\Request;
use App\SurveyDoctorPatient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function create(User $doctor, Patient $patient, $survey)
    {
        // $questions = SurveyQuestion::where('survey_id', $survey)->orderBy('order', 'asc')->get();
        // exclude question 21
        $questions = SurveyQuestion::where('survey_id', $survey)->where('id', '!=', 21 )->orderBy('order', 'asc')->get();

        return view('doctor.survey.create', compact('doctor', 'patient', 'questions', 'survey'));
    }

    public function store(Request $request)
    {
        // Save raw form data just in case... :)
        $this->storeRawData($request);
        
        foreach ($request->except('_token', 'doctor_id', 'patient_id', 'survey_id') as $question => $answer) {
            $questionId = $this->getQuestionId($question);

            if ($question == 'question_30_text') continue;
            if ($question == 'question_' . $questionId . '_other') continue;
            

            if ($questionId == 30) {
                $answer = $request->get('question_30') . ': ' . $request->get('question_30_text');
            }

            $oq = SurveyQuestion::find($questionId);
            if ($oq->other) {
                if (is_array($request->get('question_' . $questionId))) {
                    $answer = implode(', ',
                            $request->get('question_' . $questionId)) . ' ' . $request->get('question_' . $questionId . '_other');
                } else {
                    $answer = $request->get('question_' . $questionId) . ' ' . $request->get('question_' . $questionId . '_other');
                }
            }

            $surveyAnswer = new SurveyAnswer();

            $surveyAnswer->survey_question_id = $questionId;
            $surveyAnswer->doctor_id          = $request->get('doctor_id');
            $surveyAnswer->patient_id         = $request->get('patient_id');
            $surveyAnswer->answer             = json_encode((array)$answer);

            $surveyAnswer->save();
        }

        $surveyDoctorPatient             = new SurveyDoctorPatient();
        $surveyDoctorPatient->survey_id  = $request->get('survey_id');
        $surveyDoctorPatient->doctor_id  = $request->get('doctor_id');
        $surveyDoctorPatient->patient_id = $request->get('patient_id');

        $surveyDoctorPatient->save();

        if ($request->get('survey_id') == 1) {
            $notification             = new Notification();
            $notification->doctor_id  = $request->get('doctor_id');
            $notification->patient_id = $request->get('patient_id');
            $notification->send_at    = (new Carbon())->addDays(21);

            $notification->save();
        }

        return view('doctor.survey.success', ['survey' => $request->get('survey_id')])->with('success', 'survey successfully completed ');
    }

    public function createFinalSurvey(User $doctor)
    {
        Auth::login($doctor);

        $questions = SurveyQuestion::where('survey_id', 3)->get();

        return view('doctor.survey.create-final', compact('doctor', 'questions'));
    }

    public function storeFinalSurvey(Request $request)
    {
        $this->storeRawData($request);

        foreach ($request->except('_token', 'doctor_id', 'patient_id', 'survey_id') as $question => $answer) {
            $questionId = $this->getQuestionId($question);

            if ($question == 'question_' . $questionId . '_other') continue;

            $oq = SurveyQuestion::find($questionId);
            if ($oq->other) {
                if (! empty($request->get('question_' . $questionId . '_other'))) {
                    $answer = $request->get('question_' . $questionId . '_other');
                }
            }

            $surveyAnswer = new SurveyAnswer();

            $surveyAnswer->survey_question_id = $questionId;
            $surveyAnswer->doctor_id          = $request->get('doctor_id');
            $surveyAnswer->patient_id         = null;
            $surveyAnswer->answer             = json_encode((array)$answer);

            $surveyAnswer->save();
        }

        return view('doctor.survey.success', ['survey' => $request->get('survey_id')])->with('success', 'survey successfully completed ');
    }

    private function getQuestionId($question)
    {

        $id = explode('_', $question);

        return $id[1];
    }

    private function storeRawData(Request $request)
    {
        $model       = new RawSubmissionData();
        $model->data = json_encode($request->all());
        $model->save();
    }
}
