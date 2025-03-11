<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <section class="signup-1">
        <div class="container-fluid" style="padding-left:0;">
            <div class="row">
                <div class="col-6">
                    <div class="first-sec">
                        <div class="logo">
                            <img src="{{ asset('assets/img/logo-white.png') }}" alt="logo" width="100">
                        </div>
                        <div class="first-sec-cont">
                            <div class="text-cont">
                                <h4>Welcome To</h4>
                                <h1>Criminal <br>
                                    <span>Defense</span>
                                </h1>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour, or randomised words which
                                    don't
                                    look even slightly believable. </p>
                            </div>

                        </div>
                        <div class="footer">
                            <p>© copyright 2025</p>
                        </div>
                    </div>

                </div>

                <div class="col-6" style="height: 100vh;">
                    <div class="top-cont">
                        <h4>News User?
                            <span>Create an account </span>
                        </h4>
                        <i class="fa-sharp fa-thin fa-circle-ellipsis"></i>
                    </div>
                    <div class="second-sec-cont">
                        <div class="login-cont">
                            <div class="sign-in">
                                <h2>Sign In</h2>
                            </div>
                            <p>Or sign in using your email address</p>
                            <form method="POST" action="{{ route('login') }}" class="signin">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $errors->first() }}</strong>
                                    </div>
                                @endif

                                @csrf
                                <div class="row align-items-center">
                                    <div class="col-6">

                                        <label for="">Your email</label>
                                        <input type="email" name="email" class="sign-field" placeholder="Email "
                                            required >

                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">

                                        <label for="">Password</label>
                                        <input type="password" name="password" class="sign-field" placeholder="Password"
                                            required id="myInput">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-4">
                                        <div class="radio-box">
                                            <input type="checkbox" id="rm">
                                            <label for="rm">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="forget">
                                            <a href="#">Forget Password?</a>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <input type="submit" class="submitbtn" value="Sign in">
                                </div>
                        </div>
                        </Form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#passwordField');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle the eye icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>
