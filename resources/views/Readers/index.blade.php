@extends('readers.layout')

@section('content')

<div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">Library Manager</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	      <div class="navbar-nav ml-auto">
	        <a class="nav-link ml-4 text-white active btn btn-secondary" aria-current="page" href="#">Home</a>
	       	<a class="nav-link ml-4 text-white btn btn-secondary" href="http://127.0.0.1:8000/readers/create">Register</a>
	       	<a class="nav-link ml-4 text-white btn btn-danger" href="{{url('logout')}}">Logout</a>
	      </div>
	    </div>
	  </div>
	</nav>

	<hr>

	<h1 class="s-title txt-cen"> Library Entry </h1>

	<br>
	<a href="{{ route('readers.create') }}"><button type="button" class="btn btn-success">Register Entry</button></a>

	<br>
	<hr>

	<table class="table table-bordered" border="2" width="800">
		<thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Reader ID</th>
		      <th scope="col">Book Name</th>
		      <th scope="col">Writer Name</th>
		      <th scope="col">Issued Date</th>
		      <th></th>
		    </tr>
		</thead>
		<tbody>
			@if($Readers->count())
			@foreach ($Readers as $reader)
			<tr>
		      <th scope="row">{{$reader->id}}</th>
		      <td>{{$reader->reader_id}} </td>
				<td>{{$reader->book_name}} </td>
				<td>{{$reader->writer_name}} </td>
				<td>{{$reader->issued_date}} </td>
				<td>
					<form action="{{ route('readers.destroy', $reader->id)}}" method="POST">
						<a href="{{ route('readers.edit', $reader->id)}}" > 
							<button type="button" class="btn btn-primary">Edit</button> </a>					
						@csrf
	                    @method('DELETE') 

	                    <button type="submit" class="btn btn-danger">Delete</button>					
					</form>
				</td>
			</tr>
			@endforeach 
			@endif
		</tbody>

	</table>

</div>