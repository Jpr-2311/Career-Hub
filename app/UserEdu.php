<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEdu extends Model
{
    protected $fillable= [
        
        'school','degree','study_field','present','end','begin'
    ];
}
