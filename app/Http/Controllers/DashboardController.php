<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Organizations;
use App\AccountSettings;

class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      $account = AccountSettings::where('user_id', Auth::user()->id)->get();
      $organization = Organizations::where('id', $account[0]['organization_id'])->get();
      return view('dashboard/index')->with('organization', $organization);
  }
}
