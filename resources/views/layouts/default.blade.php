
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.includes.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info \ sidebar-->
            @include('layouts.includes.sidebar')
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        @include('layouts.includes.header')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            @if (count($errors) > 0)
              <div class="x_content bs-example-popovers">
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>{{ $error }}</strong>
                  </div>
                @endforeach
              </div>    
            @endif
             <div class="x_content">
                @yield('content')
            </div>  
          </div>
        </div>
        <!-- /page content -->
       
        <!-- footer content -->
        @include('layouts.includes.footer')
        <!-- /footer content -->