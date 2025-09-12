
@extends('layouts.app')

@section('content')
<div id="react-login-root" data-action="{{ route('login') }}" @if(Route::has('password.request')) data-password-reset-url="{{ route('password.request') }}" @endif></div>
@vite(['resources/sass/app.scss', 'resources/js/login.jsx'])
@endsection
