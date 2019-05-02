<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to Task Management</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}} ">
    <link rel="stylesheet" href="{{asset('css/style.css')}} ">
    <link rel="stylesheet" href="{{asset('css/nucleo.css')}}">
    <link rel="stylesheet" href="{{asset('css/argon.css?v=1.0.0')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialsicon.css')}}">
</head>
<body class="bg-default">
    <div class="main-content">
      <!-- Header -->
      <div class="header bg-gradient-primary py-lg-8">
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
      <!-- Page content -->
      <div class="container mt--8 pb-2">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-7">
            <div class="card bg-gradient-secondary shadow border-0">
              <div class="card-header bg-transparent pb-1">
                <img class="login_logo" src="{{asset('images/tlogo.png')}} " alt="My Logo">
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                <form method="POST" action="{{ route('login') }}" >
                  @csrf
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                        <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <script src="{{asset('js/jquery.min.js')}} "></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/argon.min.js')}} "></script>
</body>
</html>