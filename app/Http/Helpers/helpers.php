<?php
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

    $survey_check = \App\Patient::find($id)->surveys_completed->get(1);
    $survey_check ? $datum = $survey_check->created_at->toDateString() : $datum = null; 
    if($datum) {
        if($datum < '2018-11-29') {
            return true;
        }

    }
     else {
        return false;
    }


}