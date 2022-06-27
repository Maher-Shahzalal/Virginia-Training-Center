<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets-log/css/style.css">
</head>
<body class="img js-fullheight" style="background-image: url(assets-log/images/bg.jpg);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center"></h3>
                    <form method="POST" action="{{ route('login') }}" class="signin-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input  type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                            @error('password')
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" name="register" class="form-control btn btn-primary submit px-3">Log in</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Remember Me
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="color: #fff" >Forgot Password</a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="w-50 text-md-center">
                    <a href="{{ route('register') }}"  style="color: #fff" >Sigin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets-logjs/jquery.min.js"></script>
<script src="assets-logjs/popper.js"></script>
<script src="assets-logjs/bootstrap.min.js"></script>
<script src="assets-logjs/main.js"></script>
</body>
</html>

