<?php

namespace App\Http\Controllers\Manager;

use App\User;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function show(User $doctor)
    {
        return view('manager.doctor.show', compact('doctor'));
    }

    public function destroy(User $doctor)
    {
        $name = $doctor->name;

        $doctor->delete();

        return redirect()->back()->with('success', "{$name} is succesvol verwijderd.");
    }
}
