<?php

namespace App\Http\Controllers\Doctor;

use App\Survey;
use App\Patient;
use App\SurveyDoctorPatient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class PatientController extends Controller
{
    public function create()
    {
        $patiens = auth()->user()->patients()->count();

        if ($patiens === 10) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('doctor.patient.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|unique:patients',
            'name'   => 'required',
        ]);

        $patient = new Patient();

        $patient->user_id = auth()->user()->id;
        $patient->number  = $request->get('number');
        $patient->name    = $request->get('name');

        $patient->save();


        $survey = Survey::first();



        return view('doctor.patient.success', [
            'doctor' => auth()->user()->slug,
            'patient' => $patient->id,
            'survey' => $survey->id,
        ])->with('success', 'Patient created successfuly');
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);

        if (auth()->user()->id != $patient->user_id) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $name = $patient->name;

        $patient->delete();

        return redirect()->route('doctor.home')->with('success', "{$name} is succesvol verwijderd.");
    }
}
