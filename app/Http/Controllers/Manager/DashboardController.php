<?php

namespace App\Http\Controllers\Manager;

use App\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        
        // $doctors = auth()->user()->doctors->sortByDesc();
        $doctors = User::where('parent_id', auth()->user()->id)->orderBy('name','asc')->get();
        
        return view('manager.dashboard', ['doctors' => $doctors]);
    }

    public function index_desc()
    {
        
        // $doctors = auth()->user()->doctors->sortByDesc();
        $doctors = User::where('parent_id', auth()->user()->id)->orderBy('name','desc')->get();
        
        return view('manager.dashboard', ['doctors' => $doctors]);
    }
}
