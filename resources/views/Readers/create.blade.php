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

<nav>
	<ul class="nav justify-content-center">
	  <li class="nav-item">
	    <a class="nav-link active" href="http://127.0.0.1:8000">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="#">Register</a>
	  </li>
	</ul>
</nav>

<hr><br>

<h3 class="sub-title">Register New Entry</h3>
<hr>

<div>
	<form action="{{route('readers.store')}}" method="post">
		@csrf

		<div class="form-group">
		    <label for="ReaderID">Reader ID</label>
		    <input required type="text" class="form-control" name="reader_id" id="ReaderID" placeholder="(XX-XXXXX)">
		</div>
		<div class="form-group">
		    <label for="BookName">Book Name</label>
		    <input required type="text" class="form-control" name="book_name" id="BookName" placeholder="The Alchemist">
		</div>
		<div class="form-group">
		    <label for="WriterName">Writer Name</label>
		    <input required type="text" class="form-control" name="writer_name" id="WriterName" placeholder="Paulo Coelho">
		</div>
		<div class="form-group">
		    <label for="IssuedDate">Issued Date</label>
		    <input required type="date" class="form-control" name="issued_date" id="IssuedDate">
		</div>

		<br><br>
		<button type="submit" class="btn btn-success con-cen">Register</button>

		
	</form>

</div>