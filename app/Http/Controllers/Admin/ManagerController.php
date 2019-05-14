<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Role;
use App\User;
use App\Mail\ManagerCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ManagerController extends Controller
{
    public function create()
    {
        $managers = Role::whereCode('manager')->first()->users()->count();

        if ($managers === 11) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('admin.manager.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $role = Role::whereCode('manager')->first();

        $manager = new User();

        $manager->role_id  = $role->id;
        $manager->name     = $request->get('name');
        $manager->email    = $request->get('email');
        $manager->slug = str_slug($request->get('name'));
        $manager->password = bcrypt($request->get('password'));

        $manager->save();
        
        Mail::to($manager->email)
//            ->bcc(auth()->user()->email)
            ->send(new ManagerCreated($request->get('name'), $request->get('email'), $request->get('password')));

        return redirect()->route('admin.home')->with('success', "Het account voor Rayon Manager {$manager->name} is aangemaakt.");
    }

    public function show(User $manager)
    {
        return view('admin.manager.show', compact('manager'));
    }

    public function show_desc(User $manager) {

        return view('admin.manager.show_desc', compact('manager'));

    }

    public function destroy(User $manager)
    {
        $name = $manager->name;

        $manager->delete();

        return redirect()->back()->with('success', "{$name} is succesvol verwijderd.");
    }
}
