<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySurveyors extends Model
{

    protected $table = 'category_surveyors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['surveyor_id', 'user_id', 'category_id','organization_id', 'user_id'];

}
