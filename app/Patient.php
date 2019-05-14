<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function surveys_completed()
    {
        return $this->hasMany(SurveyDoctorPatient::class);
    }


}
