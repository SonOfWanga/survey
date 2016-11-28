<?php

namespace App\Http\Controllers;

use App\CategorySurveyors;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategorySurveyorsController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // process the login
        if (count($request->surveyor_ids)< 1) {
            $error = "Kindly select a surveyor!";
            return redirect('category/'.$request->category_id)
                ->withErrors($error);
        } 
        else {
            foreach ($request->surveyor_ids as $key => $ids) {
                $surveyor = new CategorySurveyors;
                $surveyor->surveyor_id = $key;
                $surveyor->user_id = Auth::user()->id;
                $surveyor->organization_id = session()->get('user.account.organization_id');
                $surveyor->category_id = $request->category_id;
                $surveyor->save();
            }
            return redirect('category/'.$request->category_id);
        }
        //print_r($request->category_id);

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
    public function destroy($id, $cat_id)
    {

        $surveyor = CategorySurveyors::where('surveyor_id',$id);
        $surveyor->delete();

        
        return redirect('category/'.$cat_id);
        // foreach ($request->surveyor_ids as $key => $ids) {
        //     $surveyor = 
        //     $surveyor->surveyor_id = $key;
            
        //     if($surveyor->delete()){
        //         redirect('/category/'.$request->category_id);
        //     }
        // }

    }
}
