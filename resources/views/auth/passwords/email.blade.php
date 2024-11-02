@extends('layouts.base')

@section('content')
<div class="wrapper reset-wrapper">
    <div class="reset-card">
        <h2 class="reset-header">{{ __('Reset Password') }}</h2>

        <div class="reset-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-reset">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Reset Wrapper */
.reset-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 70vh;
}

/* Reset Card */
.reset-card {
    background-color: #f4f4f4;
    padding: 40px;
    width: 100%;
    max-width: 400px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.reset-header {
    font-size: 24px;
    color: #333;
    text-transform: uppercase;
    margin-bottom: 20px;
    text-align: center;
}

/* Reset Body */
.reset-body p {
    font-size: 16px;
    color: #555;
    margin-bottom: 10px;
}

/* Alert Styling */
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
    font-size: 14px;
}

/* Button Styling */
.btn-reset {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    text-transform: uppercase;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
    text-align: center;
    border-radius: 5px;
}

.btn-reset:hover {
    background-color: #0056b3;
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-size: 16px;
    color: #333;
}

.form-control {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100%;
    font-size: 16px;
}

.invalid-feedback {
    font-size: 14px;
    color: #dc3545;
}
</style>
@endsection
