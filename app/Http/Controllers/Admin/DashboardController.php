<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $managers = Role::whereCode('manager')->first()->users;

        $filter = $request->get('filter', false);
        $order = $request->get('order', 'name');
        $sort = $request->get('sort', 'asc');

        $managers = User::whereHas('role', function($q){
            $q->where('code', 'manager');
        })->orderBy($order, $sort)->get();

        return view('admin.dashboard', compact('managers','filter', 'order', 'sort'));
    }


    public function doctor(User $doctor)
    {
        return view('admin.doctor', compact('doctor'));
    }
}
