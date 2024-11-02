@extends('layouts.base')

@section('content')
<div class="wrapper verify-wrapper">
    <div class="verify-card">
        <h2 class="verify-header">{{ __('Verify Your Email Address') }}</h2>
        
        <div class="verify-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            <p>{{ __('If you did not receive the email') }},</p>

            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn-link">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
</div>

<style>
/* Verify Wrapper */
.verify-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 70vh;
}

/* Verify Card */
.verify-card {
    background-color: #f4f4f4;
    padding: 40px;
    width: 100%;
    max-width: 400px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.verify-header {
    font-size: 24px;
    color: #333;
    text-transform: uppercase;
    margin-bottom: 20px;
    text-align: center;
}

/* Verify Body */
.verify-body p {
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

/* Button Link */
.btn-link {
    color: #007bff;
    background: none;
    border: none;
    padding: 0;
    font-size: 16px;
    text-decoration: underline;
    cursor: pointer;
}

.btn-link:hover {
    color: #0056b3;
}
</style>
@endsection
