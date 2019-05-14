<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    public function deleting(User $user)
    {
        $string = sprintf('User (%d) %s deleted (%d) %s', auth()->user()->id, auth()->user()->name, $user->id, $user->name);
        Log::info($string);
    }
}