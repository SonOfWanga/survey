<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{

    protected $table = 'questionnaire';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'question','weight','category_id','organization_id','user_id' ];
            

}
