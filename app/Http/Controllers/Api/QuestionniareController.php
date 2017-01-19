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
  public function types(){
        $types  = array('1' => 'Free text',
                        '2' => 'Yes\No',
                        '3' => 'Check box',
                        '4' => 'Option',
                        '5' => 'List',
                        '6' => 'Number');
        return $types;
    }

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
            if($question->question_type == 3 || $question->question_type == 4 || $question->question_type == 5){
                $option_obj = QuestionDetails::where('question_id', $question->id)->get(['id','question_id', 'options']);
                $question_obj[] = array('question'=>$question, 'details'=>$option_obj);
            }
            else {
                 $question_obj[] = array('question'=>$question);
            }
              
          };

          return Response::json(array("questions"=>$question_obj));

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
