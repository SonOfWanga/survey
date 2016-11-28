@extends('layouts.default')

@section('content')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Questions <small>sub title</small></h2>
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
                    <form class="form-horizontal form-label-left" method="POST" action="/questionnaire">
                      <input name="_token" hidden value="{!! csrf_token() !!}" /> 
                      <input hidden name="category_id" value="{{ $category_id }}">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Select Question type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="type" class="form-control col-md-7 col-xs-12" name="type"
                          type="text">
                          <option value="0">Select type</option>
                          @foreach($types as $key => $type)
                            <option value="{{ $key }}">{{ $type }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div id="details">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Weight <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="weight" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="weight_1" placeholder="Weight" type="number" value="{{ old('weight') }}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question">Question <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="question" class="form-control col-md-7 col-xs-12" name="question_1" placeholder="Question" 
                          type="text" value="{{ old('question') }}">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      </div>
                      <div id="select_details">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Weight <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="weight" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="weight" placeholder="Weight" type="number" value="{{ old('weight') }}">
                          </div>
                        </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question">Question <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="question" class="form-control col-md-7 col-xs-12" name="question" placeholder="Question" 
                          type="text" value="{{ old('question') }}">
                        </div>
                      </div>
                        <div id="options">
                          
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <span class="btn btn-primary" id="add_field"><i class="fa fa-plus">Add option</i></span>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#details").hide();
    $("#select_details").hide();

    $( "#type").change(function() {
        if($("#type option:selected").val() =="3" || $("#type option:selected").val() =="4"){
          $("#details").hide();
          $("#select_details").show();
        }else if($("#type option:selected").val() =="0"){
          $("#details").hide();
          $("#select_details").hide();
        }else{
          $("#details").show();
          $("#select_details").hide();
        }
    });
    //<span class="btn btn-primary" id="remove_field"><i class="fa fa-remove"></i></span>
    var i = 0;
    $("#add_field").click(function(){
      $("#options").append(
        '<div class="item form-group">'+
        '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">'+
        'Option '+ (i+1) +'<span class="required">*</span></label>'+
        '<div class="col-md-6 col-sm-6 col-xs-12">'+
        '<input id="details['+i+']" class="form-control col-md-7 col-xs-12" name="details['+i+']" placeholder="Question" type="text" value="{{ old('details') }}"><br />'+
        '</div>'+
        '</div'

        );
      i +=1;
    });

    $("#remove_field").click(function(){
      alert("haiya");
      //$('div.second div:eq(0)').attr('id')
      //$("#options").detach('<input id="details[]">');
    });
   });
</script>
@endsection            