<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('css/login.css')}}" rel="stylesheet">

  
</head>
<body>

  <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <!-- Left section with sign-up form -->
      <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <div class="signup-container text-center">
          <div class="form-header mb-3">
            <a href="{{ url('/') }}" class="d-flex">
                <img src="{{url('image/logoBIOC.png')}}" alt="logo" width="40" height="40">
                <h2>Daftar</h2>
            </a>
          </div>
          {{-- <button class="btn google-button w-100">
            <img src="{{url('image/google.png')}}" alt="Google" width="20">
            Daftar dengan Google
          </button>
          <p>atau daftar dengan email Anda</p> --}}

          <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Full name input -->
            <div class="mb-3">
              <div class="input-group">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Lengkap">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <!-- Address input -->
            <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukan Alamat Email Anda">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Email input -->
            <div class="mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukan Password Anda">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password input -->
            <div class="mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password Anda">
            </div>
            <div class="mb-3">
                <select name="role" class="form-control" required>
                    <option selected>Mendaftar Menjadi?</option>
                    <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Kandidat" {{ old('role') == 'Kandidat' ? 'selected' : '' }}>Kandidat</option>
                </select>
            </div>

            <!-- Sign Up Button -->
            <button type="submit" class="btn custom-button w-100">Sign Up</button>

            <!-- Terms and conditions text -->
            <div class="form-text mt-2">
              Dengan mendaftar, Anda setuju untuk dilindungi oleh kebijakan privasi.
            </div>
          </form>

          <!-- Sign In Option -->
          <p class="mt-3">
            Sudah mempunyai akun? <a  href="{{ route('login') }}">Sign In</a>
          </p>
        </div>
      </div>

      <!-- Right section with background text -->
      <div class="col-lg-6 d-flex align-items-center justify-content-center">
        <div class="background-text">
          <h3>SELAMAT DATANG DI</h3>
          <h2>Yayasan Gita Cahaya Karsa Putri Pasundan</h2>
        </div>
      </div>
    </div>
  </div>

  <script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select name="role" class="form-control" required>
                                    <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Kandidat" {{ old('role') == 'Kandidat' ? 'selected' : '' }}>Kandidat</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
