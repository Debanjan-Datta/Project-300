<!DOCTYPE html>
<html>
<head>
  <title>Login</title>

  <link rel="stylesheet" type="text/css" href="{{asset('resources/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('resources/style.css')}}">
</head>
<body>

    <div class="container row justify-content-center">
      <div class="col-lg-5 m-6">
          <br>
          <h1 class="s-title txt-cen"> Library Manager </h1>
          <hr> <br>
          <h2 class="s-title txt-cen">Login</h3>
          <hr>
        <form action="{{route('auth.check')}}" method="POST">
          @csrf
        <div class="mb-3 mt-5">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>      
    </div>
    <div class=" container results mt-5">
    @if (Session::get('success'))
        <h4>{{ Session::get('success') }}</h4>
    @endif
    @if (Session::get('fail'))
      <h4 class="text-danger">{{ Session::get('fail') }}</h4>
    @endif
  </div>

    <script src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
</body>
</html>