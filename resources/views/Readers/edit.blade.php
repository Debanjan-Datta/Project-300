@extends('readers.layout')

@section('content')

@if ($errors->any())
    <div  >
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
	<nav>
		<ul class="nav justify-content-center">
		  <li class="nav-item">
		    <a class="nav-link active" href="http://127.0.0.1:8000">Home</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="http://127.0.0.1:8000/readers/create">Register</a>
		  </li>
		</ul>
	</nav>
	<hr><br>
	<form action="{{route('readers.update',$reader->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="form-group">
		    <label for="ReaderID">Reader ID</label>
		    <input required type="text" class="form-control" name="reader_id" id="ReaderID" value="{{$reader->reader_id}}">
		</div>
		<div class="form-group">
		    <label for="BookName">Book Name</label>
		    <input required type="text" class="form-control" name="book_name" id="BookName" value="{{$reader->book_name}}">
		</div>
		<div class="form-group">
		    <label for="WriterName">Writer Name</label>
		    <input required type="text" class="form-control" name="writer_name" id="WriterName" value="{{$reader->writer_name}}">
		</div>
		<div class="form-group">
		    <label for="IssuedDate">Issued Date</label>
		    <input required type="date" class="form-control" name="issued_date" id="IssuedDate" value="{{$reader->issued_date}}">
		</div>

		
		<br><br>
		<button type="submit" class="btn btn-warning">Update</button>
		
	</form>

</div>