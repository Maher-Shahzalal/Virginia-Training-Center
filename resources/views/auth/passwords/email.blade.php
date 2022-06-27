<!doctype html>
<html lang="en">
<head>
    <title>Reset password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets-log/css/style.css') }}">
</head>
<body class="img js-fullheight" style="background-image: url(assets-log/images/bg.jpg);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Reset password</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center"></h3>
                    <form method="POST" action="{{ route('password.email') }}" class="signin-form">
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
                            <button type="submit" class="form-control btn btn-primary submit px-3">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('assets-logjs/jquery.min.js') }}"></script>
<script src="{{ asset('assets-logjs/popper.js') }}"></script>
<script src="{{ asset('assets-logjs/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets-logjs/main.js') }}"></script>
</body>
</html>

