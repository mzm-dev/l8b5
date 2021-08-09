@extends('layouts.blank')

@section('content')


<div class="container d-flex vh-100">
    <div class="row mx-auto">
        <div class="col align-self-center p-4">
            <div class="form-signin text-center">

                @csrf
                <div class="logo-icon bg-blue-dark rounded-circle p-2"><i class="bi bi-grid-1x2-fill fs-4 text-orange"></i></div>
                <h1 class="h3 mb-3 fw-bold">{{ config('app.short_name') }}</h1>
                <p>{{ __('Reset Password') }}</p>
                @if (session('status'))
                <div class="alert alert-success my-1" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="post" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-floating mb-2">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{ old('email') }}" autofocus
                            placeholder="name@example.com">
                        <label for="floatingInput">{{ __('E-Mail Address') }}</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="w-100 btn btn-lg bg-blue-dark">
                        {{ __('Send Password Reset Link') }}
                    </button>

                    @if (Route::has('login'))
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Back to login') }}
                    </a>
                    @endif
                    <p class="mt-5 mb-3 text-center">&copy; {{ date('Y') }}<br /><small>Bootstrap@5.0.2, Laravel v{{ Illuminate\Foundation\Application::VERSION }}</small></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
