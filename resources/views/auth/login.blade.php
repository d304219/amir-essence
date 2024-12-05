@extends('layouts.base')

@section('content')

<!-- Login Information Prompt -->
<div class="login-info-notice">
    <p>Use the following credentials to log in:</p>
    <ul>
        <li><strong>User:</strong> <span class="credentials">user (1t/m9) @exmaple.com</span> / Password: <span class="credentials">password</span></li>
    </ul>
</div>

<div class="wrapper auth-wrapper">
    <div class="auth-card">
        <h2 class="auth-header">{{ __('Login') }}</h2>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <input placeholder="user1@example.com" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input placeholder="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- <div class="form-check-group">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
            </div> --}}

            <button type="submit" class="btn-primary">{{ __('Login') }}</button>

            @if (Route::has('password.request'))
                <a class="password-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
</div>
<style>
    .login-info-notice {
    background-color: #f8f9fa;
    color: #343a40;
    padding: 15px 20px;
    text-align: center;
    font-size: 16px;
    font-weight: 500;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.login-info-notice p {
    margin: 0;
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
}

.login-info-notice ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.login-info-notice ul li {
    margin-bottom: 8px;
    font-size: 16px;
}

.login-info-notice .credentials {
    background-color: #e9ecef;
    padding: 3px 6px;
    border-radius: 4px;
    font-family: monospace;
    color: #495057;
}

</style>
@endsection
