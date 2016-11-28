@extends('layouts.default')

@section('content')
		<table class="table table-hover">
		<thead>
		<tr>
		            <th>ID</th>
		            <th>Name</th>
		            <th>Date of Birth</th>
		            <th>Gender</th>
		            <th>Occupation</th>
		            <th>Edit</th>
		            <th>Delete</th>
		</tr>
		</thead>
		<tbody>
		@foreach($questionnaire as $key => $questionnaire)
		       
		        <tr>
		            <td>{{ $id }}</td>
		            <td>{{ $questionnaire->fname }} </td>
		            <td>{{ $questionnaire->dob }}</td>
		            <td>{{ $questionnaire->gender }}</td>
		            <td>{{ $questionnaire->occupation }}</td>
		            <td></td>
		            <td></td>
		        </tr> 
		           
		@endforeach  
		 </tbody>          
		</table>  
@endsection