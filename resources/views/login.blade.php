<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
    <style>
        .container-fluid > form{
            height: 25%;
            padding:15px;
            border:1px;
            border-radius:15px;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            align-items:center;
        }

        .container-fluid{
            display:flex;
            padding:50px;
            justify-content:center;
            align-items:center;
        }
        .form .form-error {
            font-size: .75rem;
            color: red;
            font-weight: bold;
        }
        .form{
            background-color: rgba(238, 250, 254, 0.784);
            margin-top: 5%;
        }
        .btn {
            background-color: rgb(16, 207, 225);
            color: black;
        }
        .alert{
            text-align: center;
            color: rgb(255, 0, 0);
            margin: 0%;
        }
        .logout-message{
            color: rgb(249, 249, 249);
            text-align: center;

        }
    </style>
</head>
<body>
<section class="vh-100" style="background-image: url('contact.png');">
  <div class="container-fluid">

          <form style="width: 23rem;  height:30rem;" method="post" action="{{route('login')}}" class="form">
            @csrf
            <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log In</h2>
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example18">Email address</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ old('email') }}" />

                @error('email')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example28">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg" />

                @error('password')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            @if(session()->get('message'))
                <div class="alert alert-message">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class='login-button'>
              <input class="btn btn-info btn-lg btn-block" type="submit" value="Login">
            </div>

            <p>Don't have an account? <a href="/signup" class="link-info">Register here</a></p>

          </form>
  </div>
  @if(session()->get('logout'))
  <div class="logout-message">
      <b>{{ session()->get('logout') }}</b>
  </div>
@endif
</section>
</body>
</html>
