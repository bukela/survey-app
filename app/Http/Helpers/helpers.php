<?php
use App\SurveyDoctorPatient;

function getDoctorsFinishedSurveys($doctor)
{
    $finishedSurveys = 0;
    foreach ($doctor->patients as $patient) {
        $done = \App\SurveyDoctorPatient::where('patient_id', $patient->id)->count();
        if ($done >= 2) {
            $finishedSurveys++;
        }
    }
    
    return $finishedSurveys;
}

function surveys_for_delete($id) {

    // $survey_check = \App\Patient::find($id)->surveys_completed->count();
    // dd($survey_check);
    // $survey_check = SurveyDoctorPatient::where('patient_id', $id)->where('survey_id', 2)->first();
    $no_export = SurveyDoctorPatient::where('survey_id', 2)->where('created_at','<','2019-05-15')->pluck('patient_id')->toArray();
    // dd($no_export);
    // dd($survey_check);
//    $datum = $survey_check->created_at->toDateString(); 
    if(in_array($id, $no_export)) {
       
            return true;
        }
        
     else {
        return false;
    }

}