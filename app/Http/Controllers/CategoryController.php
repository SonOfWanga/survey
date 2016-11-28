<?php

namespace App\Http\Controllers;

use App\Category;
use App\Questionnaire;
use App\Surveyor;
use App\CategorySurveyors;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
        $category = Category::all();
        return view('category.index')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        //$id = $request->id;
        return view('category.new_category');
        //->with('id',$id);
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
            'title' => 'required',
            'description' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('category/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $category = new Category;
            $category->title = $request->title;
            $category->description = $request->description;
            $category->organization_id = session()->get('user.account.organization_id');
            $category->user_id = Auth::user()->id;
            $category->save();

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
        $category = Category::where('id', $id)->where('organization_id', session()->get('user.account.organization_id'))->get();
        //$category = Category::all();
        $questions = Questionnaire::where('category_id',$id)
        ->where('organization_id', session()->get('user.account.organization_id'))
        ->get();

        $x = DB::table('category_surveyors')
                  ->select('surveyor_id')
                  ->where('organization_id',session()->get('user.account.organization_id'))
                  ->where('category_id', $id)
                  ->get() ;
        $v = [];                              
         foreach ($x as $key => $value) {
            array_push($v, $value->surveyor_id);
        }   
        $all_surveyors = DB::table('surveyors')
                        ->whereNotIn('id', $v)
                         ->where('organization_id',session()->get('user.account.organization_id'))
                         ->get();
        //print_r( $v);
        $cat_surveyors = DB::table('surveyors')
                        ->whereIn('id', $v)
                        ->where('organization_id',session()->get('user.account.organization_id'))
                        ->get();

                                                                                
        return view('category.show')->with('category', $category)
                                    ->with('category_id', $category[0]['id'])
                                    ->with('questions',$questions)
                                    ->with('all_surveyors', $all_surveyors)
                                    ->with('cat_surveyors', $cat_surveyors);
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
        $category = Category::where('id', $id)->get();
        return view('category/edit')->with("category", $category);
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
        $category = Category::find($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->organization_id = session()->get('user.account.organization_id');
        $category->user_id =  Auth::user()->id;
        $category->save();
        
        return redirect('/category/'.$id);
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
