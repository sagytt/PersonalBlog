@extends('layouts.auth')

@section('title')Login @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        Login
                    </div>
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                            </div>

                            <div class="custom-control custom-checkbox mt-4">
                                <input type="checkbox" class="custom-control-input" id="login" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="login">Remember Me</label>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" href="{{ route('password.request') }}" class="btn btn-primary px-5">Login</button>
                                </div>

                                <div class="col-6">
                                    <a  class="btn btn-link">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
