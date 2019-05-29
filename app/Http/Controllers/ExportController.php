<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Role;
use App\SurveyAnswer;
use App\User;
use League\Csv\Writer;
use SplTempFileObject;
use App\SurveyQuestion;
use App\SurveyDoctorPatient;

class ExportController extends Controller
{
    public function csv($surveyId = 1, $role = null, $id = null)
    {
        if ($role == 'manager') {
            $this->exportForManager($surveyId, $id);
        } elseif ($role == 'doctor') {
            $this->exportForDoctor($surveyId, $id);
        } else {
            $this->exportAll($surveyId);
        }
    }

    public function exportAll($surveyId)
    {
        $user = auth()->user();

        if ($surveyId == 3) {
            $this->createFinalCsv($user);
        }

        $no_export = SurveyDoctorPatient::where('survey_id', 2)->where('created_at','<','2019-05-15')->pluck('patient_id')->toArray();


        if ($user->role->code == 'manager') {
             //Export data for manager doctors
            $doctorIds = $user->doctors->pluck('id')->toArray();
            $sdps      = SurveyDoctorPatient::whereIn('doctor_id', array_values($doctorIds))->whereNotIn('patient_id', $no_export)->where(['survey_id' => $surveyId])->get();

        } elseif ($user->role->code == 'doctor') { // Export for doctor patients

            $patientIds = $user->patients->pluck('id')->toArray();
            $sdps      = SurveyDoctorPatient::whereIn('patient_id', array_values($patientIds))->whereNotIn('patient_id', $no_export)->where(['survey_id' => $surveyId])->get();
            
        } else { // Export all data
            $sdps = SurveyDoctorPatient::where(['survey_id' => $surveyId])->whereNotIn('patient_id', $no_export)->get();
        }

        $fileName = date('Y-m-d') . "_survey_{$surveyId}.csv";
        $this->createCsv($surveyId, $sdps, $fileName);
    }

    public function exportForManager($surveyId, $id)
    {
        $no_export = SurveyDoctorPatient::where('survey_id', 2)->where('created_at','<','2019-05-15')->pluck('patient_id')->toArray();

        $user = User::find($id);

        $doctorIds = $user->doctors->pluck('id')->toArray();
        $sdps      = SurveyDoctorPatient::whereIn('doctor_id', array_values($doctorIds))->whereNotIn('patient_id', $no_export)->where(['survey_id' => $surveyId])->get();

        $fileName = date('Y-m-d_') . $user->slug . "_survey_{$surveyId}.csv";
        $this->createCsv($surveyId, $sdps, $fileName);
    }

    public function exportForDoctor($surveyId, $id)
    {
        $no_export = SurveyDoctorPatient::where('survey_id', 2)->where('created_at','<','2019-05-15')->pluck('patient_id')->toArray();

        $user = User::find($id);

        $patientIds = $user->patients->pluck('id')->toArray();
        $sdps      = SurveyDoctorPatient::whereIn('patient_id', array_values($patientIds))->whereNotIn('patient_id', $no_export)->where(['survey_id' => $surveyId])->get();

        $fileName = date('Y-m-d_') . $user->slug . "_survey_{$surveyId}.csv";
        $this->createCsv($surveyId, $sdps, $fileName);

    }

    protected function createCsv($surveyId, $sdps, $fileName)
    {
        $questions = SurveyQuestion::where(['survey_id' => $surveyId])
            ->whereNotIn('type', ['heading', 'label'])
            ->orderBy('id')
            ->get();


        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->setDelimiter(';');

        $header = $questions->pluck('text')->toArray();

        if ($surveyId == 1) {
            $header[2] = 'Informatie over de wond';
        }

        array_unshift($header, 'Manager', 'Doctor', 'Patient', 'Patient Number');
        $csv->insertOne($header);

        $qIds = $questions->pluck('id');

        $answers = [];

        foreach ($sdps as $sdp) {
            $results = SurveyAnswer::where([
                'doctor_id'  => $sdp->doctor_id,
                'patient_id' => $sdp->patient_id,
            ])->orderBy('survey_question_id')->get();

            foreach ($results as $result) {
                if (in_array($result->survey_question_id, $qIds->toArray())) {
                    $answer = json_decode($result->answer);

                    if ($result->survey_question_id == 2) {
                        $answer[0] = isset($answer[0]) ? (int)$answer[0] : '';
                    }

                    $answer = implode(', ', $answer);
                    $answer = filter_var($answer, FILTER_SANITIZE_STRING);

                    $answers[$sdp->doctor_id][$sdp->patient_id][$result->survey_question_id] = $answer;
                }
            }
        }

        foreach ($answers as $doctor => $patients) {
            $doctor  = User::find($doctor);
            $manager = $doctor->manager;

            foreach ($patients as $key => $answer) {
                foreach ($qIds as $qid) {
                    if (! array_key_exists($qid, $answer)) {
                        $answer[$qid] = '';
                    }
                }

                ksort($answer);

                $patient = Patient::find($key);

                try {
                    array_unshift($answer, $manager->name, $doctor->name, $patient->name, $patient->number);

                    $csv->insertOne($answer);
                } catch (\Exception $e) {

                }
            }
        }

        $csv->output($fileName);
        die();
    }

    public function createFinalCsv($user)
    {
        $questions = SurveyQuestion::where(['survey_id' => 3])
            ->whereNotIn('type', ['heading', 'label'])
            ->orderBy('id')
            ->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->setDelimiter(';');

        $header = $questions->pluck('text')->toArray();

        array_unshift($header, 'Manager', 'Doctor');
        $csv->insertOne($header);

        $drRole = Role::where('code', 'doctor')->first();

        if ($user->role->code == 'super-admin') {
            $doctors = User::where('role_id', $drRole->id)->get();
        }

        $answers = [];

        foreach ($doctors as $doctor) {
            $results = SurveyAnswer::where('doctor_id', $doctor->id)
                ->whereIn('survey_question_id', $questions->pluck('id')->toArray())
                ->orderBy('survey_question_id')->get();

            foreach ($results as $result) {
                if (in_array($result->survey_question_id, $questions->pluck('id')->toArray())) {
                    $answer = json_decode($result->answer);
                    $answer = implode(', ', $answer);
                    $answer = filter_var($answer, FILTER_SANITIZE_STRING);

                    $answers[$doctor->id][$result->survey_question_id] = $answer;
                }
            }
        }

        foreach ($answers as $doc => $answer) {
            $drUser = User::find($doc);
            $manager = $drUser->manager;

            foreach ($questions->pluck('id')->toArray() as $questionId) {
                if (! array_key_exists($questionId, $answer)) {
                    $answer[$questionId] = '';
                }
            }

            ksort($answer);
            array_unshift($answer, $manager->name, $drUser->name);
            $csv->insertOne($answer);
        }

        $fileName = date('Y-m-d_') . $drUser->slug . "_survey_3.csv";
        $csv->output($fileName);

        die();
    }
}
