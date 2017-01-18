<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use App\AccountSettings;
use App\Organizations;
use App\User;

class AccountUsersController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    $account = AccountSettings::where('user_id', Auth::user()->id)->get();
    $accounts = DB::table('account_settings')->where('organization_id',$account[0]['organization_id'])->pluck('user_id');
    $users = DB::table('users')
                    ->whereIn('id', $accounts)
                    ->get();
    $organization = Organizations::where('id', $account[0]['organization_id'])->get();
    return view('account_users/index')->with('organization', $organization)->with('users', $users);
  }

  public function create(){

  }

  public function store(Request $request){
    $rules = array(
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    );
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect('accountusers/index')
            ->withErrors($validator)
            ->withInput($request->except('password'));
    }
    else {
        // store
        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($user->save()){
            $acc = new AccountSettings;
            $acc->organization_id = session()->get('user.account.id');
            $acc->user_id = $user->id;
            $acc->status = 0;
            $acc->save();
            return $this->index();
        }
      return $this->index();
    }
  }
}
