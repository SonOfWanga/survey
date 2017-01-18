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

  @endif
@endsection
