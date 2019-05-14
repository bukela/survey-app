<?php

namespace App;

use App\Traits\Sluggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;

    protected static $sluggable = [
        'from' => ['name'],
        'to' => 'slug',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id', 'role_id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function manager()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function doctors()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPasswordReset($token));
    }
}

class CustomPasswordReset extends ResetPassword
{

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Wachtwoord resetten')
            ->greeting('Hallo')
            ->line('U ontvangt deze email omdat wij een aanvraag ontvingen om uw wachtwoord te resetten voor uw Convatec account. ')
            ->action('Reset wachtwoord', url(config('app.url') . route('password.reset', $this->token, false)))
            ->line('Als u geen aanvraag heeft ingediend hoeft u verder niets te doen.');
    }
}
