<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Surveyor extends Model
{

    protected $table = 'surveyors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fname', 'lname', 'gender', 'phone_number', 'email','api_token', 'dob', 'occupation', 'organization_id', 'user_id'];

}
