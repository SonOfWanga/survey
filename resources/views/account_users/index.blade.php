@extends('layouts.default')

@section('content')
 @if(!$organization)
	@include('organization.initial_page')
 @else
 @php
  $organization_id = session()->get('user.account.id');
 @endphp
  <div class="well">
    <div class="pull-right">
      <a class="btn btn-success" href="{{ url('organization/'.$organization_id.'/edit')}}">Edit</a>
    </div>
  @foreach($organization as $key => $organization )
    <h3>{{ $organization->org_name }}</h3>
    <h3>{{ $organization->address }}</h3>
    <h3>{{ $organization->phone_number }}</h3>
    <h3>{{ $organization->industry }}</h3>
    <h3>{{ $organization->email }}</h3>
  @endforeach

  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="well">
        <div class="x_panel">
          <div class="x_title">
            <h2>New User <small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="form-horizontal form-label-left" data-parsley-validate method="POST" action="/accountusers">
              <input name="_token" hidden value="{!! csrf_token() !!}" />
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">First Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="fname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fname" placeholder="First name" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Last name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="lname" id="lname" name="lname" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="reset" class="btn btn-primary">Reset</button>
                  <button id="send" type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Users <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @php
              $id = 1;
              if(count($users)>0){
            @endphp
               @foreach($users as $key => $user )
                <tr>
                  <th scope="row">{{ $id }}</th>
                  <td>{{ $user->fname }}</td>
                  <td>{{ $user->lname }}</td>
                  <td>{{ $user->gender }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone_number }}</td>
                  <td></td>
                  <td></td>
                </tr>
                @php
                  $id +=1;
                @endphp
              @endforeach
              @php
                };
              @endphp
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  @endif
@endsection
