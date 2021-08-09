@extends('layouts.blank')

@section('content')

<div class="container d-flex vh-100">
    <div class="row mx-auto">
        <div class="col align-self-center p-4">
            <div class="form-signin text-center">

                @csrf

                <div class="logo-icon bg-blue-dark rounded-circle p-2"><i class="bi bi-grid-1x2-fill fs-4 text-orange"></i></div>
                <h1 class="h3 mb-3 fw-bold">{{ config('app.short_name') }}</h1>
                <p>Please sign in</p>
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating">
                        <input name="email" type="email" class="form-control rounded-0 rounded-top @error('email') is-invalid @enderror" id="floatingInput" value="{{ old('email') }}" autofocus
                            placeholder="name@example.com">
                        <label for="floatingInput">{{ __('E-Mail Address') }}</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input name="password" type="password" class="form-control rounded-0 rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">{{ __('Password') }}</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="w-100 btn btn-lg bg-blue-dark">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    <p class="mt-5 mb-3 text-center">&copy; {{ date('Y') }}<br /><small>Bootstrap@5.0.2, Laravel v{{ Illuminate\Foundation\Application::VERSION }}</small></p>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
