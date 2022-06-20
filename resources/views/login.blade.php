<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Signin Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    
<link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.2/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
<main class="form-signin w-100 m-auto">
  <form action="/user/ceklogin" method="POST">
    @csrf
    <div class="col-lg-12">
    @foreach (['info', 'success', 'danger'] as $msg)
                    @if (session('alert-' . $msg))
                    <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                        <strong>{{ (session('alert-' . $msg)) }}</strong>
                    </div>
                    @endif
                    @endforeach
    </div>
    <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Form Login</h1>
    <div class="form-floating">
      <input type="no_handphone" name="no_handphone" class="form-control" id="floatingInput" placeholder="No. Handphone" autofocus>
      <label for="floatingInput">No. Handphone</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>


    
  </body>
</html>