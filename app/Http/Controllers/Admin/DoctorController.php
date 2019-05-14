<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function show(User $doctor)
    {
        return view('admin.doctor.show', compact('doctor'));
    }

    public function destroy(User $doctor)
    {
        $name = $doctor->name;

        $doctor->delete();

        return redirect()->back()->with('success', "{$name} is succesvol verwijderd.");
    }
}
