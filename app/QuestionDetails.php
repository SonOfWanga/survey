<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionDetails extends Model
{

    protected $table = 'question_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['question_id', 'option'];

}
