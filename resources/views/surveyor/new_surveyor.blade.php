@extends('layouts.default')

@section('content')
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <a href="{{ route('organization.index')}}"><i class="fa fa-arrow-left fa-2x"></i></a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Surveyor <small>sub title</small></h2>
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
            <form class="form-horizontal form-label-left" data-parsley-validate method="POST" action="/surveyor">
              <input name="_token" hidden value="{!! csrf_token() !!}" />
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">Fist name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="fname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fname" placeholder="Fist name" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Last Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="lname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="lname" placeholder="Last Name" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="gender" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="gender" placeholder="Gender" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date of Birth<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="dob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dob" placeholder="Date of Birth" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Occupation<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="occupation" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="occupation" placeholder="Occupation" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_number">Phone number<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="phone_number" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="phone_number" placeholder="Phone number" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="email" class="form-control col-md-7 col-xs-12" name="email" placeholder="Email" required="required" type="email">
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
@endsection
