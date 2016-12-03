@extends('layouts.default')

@section('content')
 @if(!$organization)
	@include('organization.initial_page')
 @else
 @php
  $organization_id = session()->get('user.account.organization_id');
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
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Forms <small>basic table subtitle</small></h2>
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
                          <th>Title</th>
                          <th>Description</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php
                        $id = 1;
                      @endphp
                        @foreach($categories as $key => $category )
                          <tr>
                            <th scope="row"><a href="{{ url('category/'.$category->id)}}">{{ $id }}</a></th>
                            <td><a href="{{ url('category/'.$category->id)}}">{{ $category->title }}</a></td>
                            <td><a href="{{ url('category/'.$category->id)}}">{{ $category->description }}</a></td>
                          </tr>
                          @php 
                            $id +=1;
                          @endphp   
                        @endforeach                        
                      </tbody>
                    </table>
                    <div><a class="btn btn-success" href="{{ route('category.create') }}">Add Questionnaire</a></div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surveyors <small>basic table subtitle</small></h2>
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
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php
                        $id = 1;
                      @endphp
                        @foreach($surveyors as $key => $surveyor )
                          <tr>
                            <th scope="row">{{ $id }}</th>
                            <td>{{ $surveyor->fname }}</td>
                            <td>{{ $surveyor->lname }}</td>
                            <td>{{ $surveyor->email }}</td>
                            <td>{{ $surveyor->phone_number }}</td>
                          </tr>
                          @php 
                            $id +=1;
                          @endphp  
                        @endforeach  
                      </tbody>
                    </table>
                      <div><a class="btn btn-success" href="{{ route('surveyor.create') }}">Add Surveyor</a></div>
                  </div>
                </div>
              </div>
            </div>  
    @endif          
@endsection