@extends('layouts.default')

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <a href="{{ route('organization.index')}}"><i class="fa fa-arrow-left fa-2x"></i></a>
    </div>
  </div>
  <div class="well">
    <div class="pull-right">
    @foreach($category as $key => $category )
      @php
        if($category->published_state == 1){
      @endphp
        <a class="btn btn-warning" href="{{ url('category/'.$category_id.'/publish')}}">Unpublish</a>
      @php
        }  else {
      @endphp
        <a class="btn btn-success" href="{{ url('category/'.$category_id.'/publish')}}">Publish</a>
      @php
        };
      @endphp
      <a class="btn btn-primary" href="{{ url('category/'.$category_id.'/edit')}}">Edit</a>
      <a class="btn btn-danger" href="{{ url('category/delete/'.$category_id)}}">Delete</a>
    </div>


    <h3>{{ $category->title }}</h3>
    @php
      if($category->category_type) {
    @endphp
        <h4>Closed form</h3>
    @php
      } else {
    @endphp
        <h4>Open form</h3>
    @php
      }
    @endphp
    <h3>{{ $category->description }}</h3>
    @endforeach

  </div>
		<div class="row">
      <div class="<?php echo $category['category_type'] == 1? 'col-md-6 col-sm-6 col-xs-12':  'col-md-12 col-sm-12 col-xs-12'; ?>">
        <div class="x_panel">
          <div class="x_title">
            <h2>Questions <small></small></h2>
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
                  <th>Question</th>
                  <th>Weight</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @php
                $id = 1;
                if(count($questions)>0){
              @endphp
                 @foreach($questions as $key => $qsn )
                  <tr>
                    <th scope="row">{{ $id }}</th>
                    <td>{{ $qsn->question }}</td>
                    <td>{{ $qsn->weight }}</td>
                    <td><a href="{{ url('questionnaire/'.$qsn->id.'/edit') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                    <td><a href="{{ url('questionnaire/delete/'.$qsn->id.'/category/'.$category_id) }}" ><i class="fa fa-times" aria-hidden="true"></i></a></td>
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
            <div><a class="btn btn-success" href="{{ route('questionnaire.create', ['category_id'=> $category_id ]) }}">Add Questions</a></div>
          </div>
        </div>
      </div>
      @php
        if($category['category_type'] == 1){
      @endphp
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Surveyors <small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#"><?php print_r($category['category_type']); ?></a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           @php

            if(count($cat_surveyors)>0 && $category['category_type'] == 1){
           @endphp
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
              @php
                $id = 1;
              @endphp
                @foreach($cat_surveyors as $key => $surveyor )
                  <tr>
                    <th scope="row">{{ $id }}</th>
                    <td>{{ $surveyor->fname }}</td>
                    <td>{{ $surveyor->lname }}</td>
                    <td><a href="{{ url('/categorysurveyors/'.$surveyor->id.'/delete/'.$category_id) }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  @php
                    $id +=1;
                  @endphp
                @endforeach
              </tbody>
            </table>
            @php
              };
            @endphp
            <div>
            </div>
            @php
              if(count($all_surveyors)> 0){
            @endphp
            <form method="POST" action="/categorysurveyors">
            {{ csrf_field() }}
              @php
                $id = 1;
              @endphp
                @foreach($all_surveyors as $key => $surveyor )
                  <!-- <tr>
                    <th scope="row">{{ $id }}</th>
                    <td>{{ $surveyor->fname }}</td>
                    <td>{{ $surveyor->lname }}</td>
                    <td><input type="checkbox"></td>
                    <input hidden name="category_id" value="{{ $category_id }}">
                  </tr>  -->
                  <div class="">
                    <ul class="to_do">
                      <li>
                        <p>
                          <input hidden name="category_id" value="{{ $category_id }}">
                          <input type="checkbox" class="flat" name="surveyor_ids[ {{ $surveyor->id}} ]" id="id"> {{ $surveyor->fname.' '.$surveyor->lname }} </p>
                      </li>
                   </ul>
                 </div>
                  @php
                    $id +=1;
                  @endphp
              @endforeach

            <div>
                <button class="btn btn-success" type="submit" id="add_button"> Add Surveyor</button>
            </div>
            </form>
            @php
              };
            @endphp
          </div>
        </div>
      </div>
      @php
        };
      @endphp
    </div>
    <script type="text/javascript">
      // $(document).ready(function(){
      //    $("#add_button").hide();
      //    //$('input[type="checkbox"]').click(function(){
      //     if($('#id').is(':checked')){
      //       $("#add_button").show();
      //     }
      //     else {
      //       $("#add_button").hide();
      //     }
      //   });
      // //});
    </script>
@endsection
