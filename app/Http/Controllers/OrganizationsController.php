<?php

namespace App\Http\Controllers;

use App\Organizations;
use App\AccountSettings;
use App\Surveyor;
use App\Category;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class OrganizationsController extends Controller
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
    public function index(Request $request)
    {
         $account = AccountSettings::where('user_id', Auth::user()->id)->get();
        
        if($account->count() > 0){
                foreach ($account as $key => $value) {
                    $setAccountSession = $value;
                };

                $organization = Organizations::where('user_id', Auth::user()->id)->
                                where('id', $account[0]['organization_id'])->get();
                $surveyors = Surveyor::where('organization_id',$account[0]['organization_id'])->get();

                $categories = Category::where('organization_id',$account[0]['organization_id'])->get();
                
                if(count($organization)>0){
                    $this->sessionFunction($request, $setAccountSession);
                    return view('organization.index')->with('organization', $organization)->with('surveyors', $surveyors)->with('categories', $categories);
                }else{
                    $organization = null;
                    return view('organization.index')->with('organization', $organization);
                }
        }
        else {

            $organization = null;
            return view('organization.index')->with('organization', $organization); 
        }
        // load the view and pass the nerds
        
        //return view('organization.index');
        //print_r(session()->get('user.account.id'));
        //print_r(count($account));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('organization.new_organization');
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'website' => 'required',
            'industry' => 'required',
            'address' => 'required',
            'number_of_employees' => 'required|numeric',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('organization/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $org = new Organizations;
            $org->org_name = $request->name;
            $org->email = $request->email;
            $org->phone_number = $request->phone_number;
            $org->website = $request->website;
            $org->industry = $request->industry;
            $org->address = $request->address;
            $org->number_of_employees = $request->number_of_employees;
            $org->user_id =  Auth::user()->id;
            
            if($org->save()){
                $acc = new AccountSettings;
                $acc->organization_id = $org->id;
                $acc->user_id = Auth::user()->id;
                $acc->status = 0;
                $acc->save();

                $this->sessionFunction($request, $acc);
                //echo session('user.account');

                return redirect('organization');
            }
            else  {
                //return redirect('organization/create');
            }
            // redirect
            //Session::flash('message', 'Successfully created nerd!');
            
        }
    }

    public function sessionFunction($request, $account){

        $request->session()->put('user.account', $account);
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
        $organization = Organizations::where('id', $id)->get();
        return view('organization/edit')->with('organization', $organization);
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
        $org = Organizations::find($id);
        $org->org_name = $request->name;
        $org->email = $request->email;
        $org->phone_number = $request->phone_number;
        $org->website = $request->website;
        $org->industry = $request->industry;
        $org->address = $request->address;
        $org->number_of_employees = $request->number_of_employees;
        $org->user_id =  Auth::user()->id;
        $org->save();
        
        return redirect('/organization');
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
