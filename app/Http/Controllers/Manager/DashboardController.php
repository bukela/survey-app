<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $doctors = auth()->user()->doctors;

        return view('manager.dashboard', ['doctors' => $doctors]);
    }
}
