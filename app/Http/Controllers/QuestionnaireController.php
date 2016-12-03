<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\QuestionDetails;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //
        $questionnaire = Questionnaire::all();

        return view('questionnaire.index')->with('questionnaire',$questionnaire );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function types(){
        $types  = array('1' => 'Free text',
                        '2' => 'Yes\No',
                        '3' => 'Check box',
                        '4' => 'Option',
                        '5' => 'List',
                        '6' => 'Number');
        return $types;
    }

    public function create(Request $request)
    {
        $types = $this->types();
        return view('questionnaire.new_questionnaire')
                ->with('category_id', $request->category_id)
                ->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //


        // $table->increments('id');
        //     $table->integer('question_id');
        //     $table->string('option');
        // foreach ($request->details as $key => $value) {
        //     # code...
        //     echo $key."  ".$value;
        // };
        if ($request->details){
            $rules = array(
                'type' => 'required',
                'category_id'=> 'required',
                'question' => 'required',
                'weight'=>'required'
                );
            $validator = Validator::make($request->all(), $rules);

        }else {
            $rules = array(
                'type' => 'required',
                'category_id'=> 'required',
                'question_1' => 'required',
                'weight_1'=>'required'
            );
            $validator = Validator::make($request->all(), $rules);
        }

        if ($validator->fails()) {
            return redirect('questionnaire/create?category_id='.$request->category_id)
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }
        else {
            // store
            $qsn = new Questionnaire;
            $qsn->question_type = $request->type;
            if($request->details){
                $qsn->question = $request->question;
                $qsn->weight = $request->weight;
            } else {
                $qsn->question = $request->question_1;
                $qsn->weight = $request->weight_1;
            };
            $qsn->category_id = $request->category_id;
            $qsn->organization_id = session()->get('user.account.organization_id');
            $qsn->user_id =  Auth::user()->id;
            $qsn->save();

            if($qsn->id){
                if($request->details){


                    foreach ($request->details as $key => $value) {
                        $qsn_details = new QuestionDetails;
                        $qsn_details->question_id = $qsn->id;
                        $qsn_details->option = $value;
                        $qsn_details->save();
                    };
                }

                return redirect('category/'.$request->category_id);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Questionnaire::where('id', $id)->first();
        $options = QuestionDetails::where('question_id', $id)->get();
        return view('questionnaire.edit')
                    ->with('question', $question)
                    ->with('types', $this->types())
                    ->with('options', $options);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    Questionnaire::where('id', $id)
                 ->update(['question' => $request->question], ['weight' => $request->weight]);

    foreach($request->option as $key => $value){
      QuestionDetails::where('id', $key)
                    ->where('question_id', $id)
                    ->update(['option' => $value]);
    }

    if($request->details){
          foreach ($request->details as $key => $value) {
              $qsn_details = new QuestionDetails;
              $qsn_details->question_id = $id;
              $qsn_details->option = $value;
              $qsn_details->save();
          };
    }
    return $this->edit($id);
    // $question = Questionnaire::where('id', $id)->first();
    // $options = QuestionDetails::where('question_id', $id)->get();
    // return view('questionnaire.edit')
    //             ->with('question', $question)
    //             ->with('types', $this->types())
    //             ->with('options', $options);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
