<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }
}
