<?php

namespace App\Http\Controllers;

use App\Surveyor;
use App\category;
use App\CategorySurveyors;
use App\Questionnaire;
use App\QuestionDetails;
use Validator;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
//use Illuminate\Support\Facades\Auth;

class SurveyorApiController extends Controller
{
    
    public function login()
    {
        //$var = Surveyor::where('email', 'p@g.com')->first();
        //$var = ['what'=> 'what is wrong with you', 'why'=> 'why is it a problem'];
        $var = Surveyor::all();
        return Response::json($var);
    }

    public function form(){
        $surveyor = Surveyor::where('email', 'p@g.com')->get();
        $categorysurveyor = CategorySurveyors::where('surveyor_id', $surveyor[0]->id)->get();
        $category = Category::where('id', $categorysurveyor[0]->category_id)->get();

        $Questionnaire = Questionnaire::where('category_id', $category[0]->id)->get(['id', 'category_id','question', 'question_type']);
        $question_obj = [];
        foreach($Questionnaire as $question){
            //$question_obj[] = $question;
            $option_obj = QuestionDetails::where('question_id', $question->id)
                                          ->get(['question_id', 'option']);
            $question_obj[] = array('question'=>$question, 'options'=>$option_obj);                              
        };
        
        return Response::json($question_obj);

    }

}    
