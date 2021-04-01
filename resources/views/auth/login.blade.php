@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="{{ route('login') }}">
        @csrf
                
        <label for="usuario">{{ __('Usuario') }}</label>
        <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="usuario" autofocus>

            @error('usuario')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                        
        <label for="password">{{ __('Password') }}</label>               
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                              
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
                                
        <button type="submit">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
                                                 
    </form>     

</div>
@endsection
