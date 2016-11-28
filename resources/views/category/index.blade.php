@extends('layouts.default')

@section('content')
		<table class="table table-hover">
		<thead>
		<tr>
		            <th>ID</th>
		            <th>Name</th>
		            <th>Email</th>
		            <th>Questionnaire</th>
		</tr>
		</thead>
		<tbody>
		@foreach($category as $key => $category)
		       
		        <tr>
		            <td>{{ $category->id }}</td>
		            <td>{{ $category->title }}</td>
		            <td>{{ $category->description }}</td>
		            <td><a href="{{ route('questionnaire.create', ['id'=> $category->id, 'org'=>$category->organization_id]) }}">Questionniare </a></td>
		        </tr> 
		           
		@endforeach  
		 </tbody>          
		</table>  
@endsection