<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $patients = auth()->user()->patients;

        return view('doctor.dashboard', compact('patients'));
    }
}
