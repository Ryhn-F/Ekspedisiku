<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/LoginForm.css') }}">


    <title>Login</title>
</head>
<body>
    <div>
        <div class="bg">
          <div>

          </div>
          <div class="wrapCenter">
            <div class="wrapper">

              <form action="" method="POST">
                @csrf
                <h1>Login</h1>
                @if ($errors -> any())

                <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item )
                            <li>{{$item}}</li>

                            @endforeach
                        </ul>
                </div>

                @endif
                <div class="input-box">
                  <input
                    type="email"
                    placeholder="email"
                    value="{{old('email')}}"
                    id="Username"
                    name="email"
                    required
                  />

                </div>
                <div class="input-box">
                  <input
                    type="password"
                    placeholder="Password"
                    name="password"
                    id="Password"
                    required
                  />

                </div>
                <div class="remember-forgot">
                  <label>
                    <input type="checkbox" />
                    Remember me
                  </label>
                </div>
                <button type="submit" class="button">
                  <span class="button_text">Login</span>
                </button>
                <div class="register-link">
                  <p>

                    Don't have an account?
                    <a href="#">Register</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
