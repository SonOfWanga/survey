<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{

    protected $table = 'organizations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'org_name','email','phone_number','website','industry','address','number_of_employees', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
