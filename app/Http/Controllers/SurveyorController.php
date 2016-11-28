<?php

namespace App\Http\Controllers;

use App\Surveyor;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class SurveyorController extends Controller
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
        $surveyor = Surveyor::all();
        return view('surveyor.index')->with('surveyor',$surveyor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        //$org_id = $request->id;
        //print_r( session()->get('user.account.organization_id') );
        //return view('surveyor.new_surveyor')->with('org_id', $org_id);
        return view('surveyor.new_surveyor');
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
        $rules = array(
            'fname' => 'required',
            'lname' => 'required',
            // 'gender' => 'required',
            // 'dob' => 'required',
            // 'occupation' => 'required',
            // 'phone_number' => 'required',
            // 'email' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('surveyor/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $surveyor = new Surveyor;
            $surveyor->fname = $request->fname;
            $surveyor->lname = $request->lname;
            $surveyor->gender = $request->gender;
            $surveyor->dob = $request->dob;
            $surveyor->phone_number = $request->phone_number;
            $surveyor->email = $request->email;
            $surveyor->api_token = str_random(60);
            $surveyor->occupation = $request->occupation;
            $surveyor->organization_id = session()->get('user.account.organization_id');
            $surveyor->user_id = Auth::user()->id;
            $surveyor->save();

            // redirect
            //Session::flash('message', 'Successfully created nerd!');
            return redirect('organization');
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
        //
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
        //
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
