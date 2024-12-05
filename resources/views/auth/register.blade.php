@extends('main') <!-- Extends your custom layout -->

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100" style="font-family: 'Poppins', sans-serif;">
        <!----------------------- Register Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow" style="width: 930px;">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column" style="background: #103cbe;">
                <div class="mb-3">
                    <img src="{{ asset('image/register.png') }}" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2 fw-bold" style="font-family: 'Courier New', Courier, monospace;">Join Us!</p>
                <small class="text-white text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace;">
                    Sign up now and start your journey with us.
                </small>
            </div>
            <!-------------------------- Right Box ------------------------------>
            <div class="col-md-6 p-4">
                <div>
                    <div class="mb-4">
                        <h2>Welcome!</h2>
                        <p>Create your account to get started.</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name Field -->
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control form-control-lg bg-light fs-6" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Email Field -->
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Password Field -->
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Confirm Password Field -->
                        <div class="mb-3">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg bg-light fs-6" placeholder="Confirm Password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Sign Up</button>
                        </div>
                    </form>
                    <div class="mb-3">
                        <a href="{{ route('google-auth') }}"
                            class="btn btn-lg btn-light w-100 fs-6 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('image/google.png') }}" style="width: 20px;" class="me-2">
                            <small>Sign Up with Google</small>
                        </a>
                    </div>

                    <div>
                        <small>Already have an account? <a href="{{ route('login') }}">Log In</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
