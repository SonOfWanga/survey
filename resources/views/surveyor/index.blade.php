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
		@foreach($surveyor as $key => $surveyor)
		       
		        <tr>
		            <td>{{ $surveyor->id }}</td>
		            <td>{{ $surveyor->fname.' '.$surveyor->lname }} </td>
		            <td>{{ $surveyor->dob }}</td>
		            <td>{{ $surveyor->gender }}</td>
		            <td>{{ $surveyor->occupation }}</td>
		            <td></td>
		            <td></td>
		        </tr> 
		           
		@endforeach  
		 </tbody>          
		</table>  
@endsection