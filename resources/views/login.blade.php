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
            border:1px solid rgba(0,0,0,0.5);
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
    </style>
</head>
<body>
<section class="vh-100">

  <div class="container-fluid">

          <form style="width: 23rem;" method="post" action="{{route('login')}}" class="form">
            @csrf
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <div class="form-outline mb-4">
              <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ old('email') }}" />
              <label class="form-label" for="form2Example18">Email address</label>
                @error('email')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="password" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example28">Password</label>
                @error('password')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="pt-1 mb-4">
              <input class="btn btn-info btn-lg btn-block" type="submit" value="Login">
            </div>

            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            <p>Don't have an account? <a href="/signup" class="link-info">Register here</a></p>

          </form>
  </div>
</section>
</body>
</html>
