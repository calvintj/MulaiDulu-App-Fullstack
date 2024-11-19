@extends('main') <!-- Extends the Breeze guest layout -->

@section('content')
    <div class="container d-flex justify-content-center align-items-center"
        style="height: 750px; font-family: 'Poppins', sans-serif;">
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow" style="width: 930px;">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column"
                style="background: #103cbe;">
                <div class="mb-3">
                    <img src="{{ asset('image/register.png') }}" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2 fw-bold" style="font-family: 'Courier New', Courier, monospace;">Be Ready!</p>
                <small class="text-white text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace;">
                    Embark your journey to success with this platform.
                </small>
            </div>
            <!-------------------------- Right Box ------------------------------>
            <div class="col-md-6 p-4">
                <div>
                    <div class="mb-4">
                        <h2>Hello, Again</h2>
                        <p>We are happy to have you back.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Email address" style="font-size: 16px;" value="{{ old('email') }}" required
                                autofocus>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password" style="font-size: 16px;" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary">
                                    <small>Remember Me</small>
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <div>
                                    <small><a href="{{ route('password.request') }}">Forgot Password?</a></small>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>
                    <div class="mb-3">
                        <a href="{{ route('google-auth') }}"
                            class="btn btn-lg btn-light w-100 fs-6 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('image/google.png') }}" style="width: 20px;" class="me-2">
                            <small>Sign In with Google</small>
                        </a>
                    </div>

                    <div>
                        <small>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
