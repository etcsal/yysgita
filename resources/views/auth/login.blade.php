<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('css/login.css')}}" rel="stylesheet">
</head>
<body>

  <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <!-- Left section with sign-in form -->
      <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <div class="login-container text-center">
          <!-- Alert for wrong credentials -->
          {{-- <div class="alert alert-danger" id="alertBox">
            Username atau password salah!
          </div> --}}
          
          <div class="form-header mb-3">
            <a href="{{ url('/') }}" class="d-flex">
                <img src="{{url('image/logoBIOC.png')}}" alt="logo" width="40" height="40">
                <h2>Sign In</h2>
            </a>
          </div>
          {{-- <button class="btn google-button w-100">
            <img src="{{url('image/google.png')}}" alt="Google" width="20">
            Daftar dengan Google
          </button>
          <p>atau masuk dengan email Anda</p> --}}
          
          <!-- Form -->
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Username input -->
            <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan Email Anda">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password input -->
            <div class="mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukan Password Anda">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Remember Me and Forgot Password -->
            <div class="d-flex justify-content-between mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="rememberMe">Ingat Saya</label>
              </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            @endif
            </div>

            <!-- Sign In Button -->
            <button type="submit" class="btn custom-button w-100">Sign In</button>
          </form>

          <!-- Sign Up Option -->
          {{-- <p class="mt-3">
            Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
          </p> --}}
        </div>
      </div>

      <!-- Right section with background text -->
      <div class="col-lg-6 d-flex align-items-center justify-content-center">
        <div class="background-text">
          <h3>SELAMAT DATANG KEMBALI DI</h3>
          <h2>Yayasan Gita Cahaya Karsa Putri Pasundan</h2>
        </div>
      </div>
    </div>
  </div>

  <script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
  
  <!-- Simple JavaScript for login validation -->
  {{-- <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault(); // Prevent the form from submitting
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;

      // Simulate wrong credentials (you can replace this logic with actual validation)
      if (username !== 'correctUsername' || password !== 'correctPassword') {
        document.getElementById('alertBox').style.display = 'block'; // Show the alert box
      } else {
        document.getElementById('alertBox').style.display = 'none'; // Hide the alert box
        // You can redirect or proceed with login here
        alert('Login successful!');
      }
    });
  </script> --}}

</body>
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
