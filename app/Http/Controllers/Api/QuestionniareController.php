<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\AccountSettings;
use App\Organizations;
use App\Category;
use App\Questionnaire;
use App\QuestionDetails;
use App\User;

class QuestionniareController extends Controller {
  // public function __construct()
  // {
  //     $this->middleware('auth');
  // }
  // public function index(Request $request){
  //   return "index what what";
  // }

  public function getForm(Request $request){

    $code = $request->code;
    $cat = Category::where('category_code', $code)->where('published_state', 1)->get();
    
    if(count($cat) > 0){
      if($cat[0]->category_type == 0){
          $questions =  Questionnaire::where('category_id',$cat[0]->id)
                        ->where('organization_id', $cat[0]->organization_id)
                        ->get();
          
          $question_obj = [];
          foreach($questions as $question){
              //$question_obj[] = $question;
              $option_obj = QuestionDetails::where('question_id', $question->id)->get(['question_id', 'options']);
              $question_obj[] = array('question'=>$question, 'details'=>$option_obj);
          };

          return Response::json($question_obj);

          //return $question_obj;
      }
      elseif($cat[0]->category_type == 1){
          return  Response::json( array('error'=>"Form closed")) ;
      }
    }
    else{
        return Response::json( array('error'=>"category not found")) ;
    }
  }
}
