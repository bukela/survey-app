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