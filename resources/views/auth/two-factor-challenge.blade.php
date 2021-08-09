@extends('layouts.blank')

@section('content')
<div class="container d-flex vh-100">
    <div class="row mx-auto">

        <div class="form-signin text-center">
            <div class="card">
                <div class="card-header">{{ __('Two factor Challenge') }}</div>

                <div class="card-body">
                    <p class="text-center">
                        {{ __('Please enter your authentication code to login.') }}
                    </p>

                    <form method="POST" action="{{ route('two-factor.login') }}">
                        @csrf

                        <div class="form-group row mb-2">
                            <label for="code" class="col-md-12 col-form-label text-md-right">{{ __('Authentication code:') }}</label>

                            <div class="col-md-12">
                                <input id="code" type="code" class="form-control text-center @error('code') is-invalid @enderror" name="code" required autocomplete="current-code"  placeholder="xxxxxx">

                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-3 card">
                <div class="card-header">{{ __('Two factor Recovery Code') }}</div>

                <div class="card-body">
                    <p class="text-center">
                        {{ __('Please enter your recovery code to login.') }}
                    </p>

                    <form method="POST" action="{{ route('two-factor.login') }}">
                        @csrf

                        <div class="form-group row mb-2">
                            <label for="recovery_code" class="col-md-12 col-form-label text-md-right">{{ __('Recovery Code:') }}</label>

                            <div class="col-md-12">
                                <input id="recovery_code" type="recovery_code" class="form-control text-center @error('recovery_code') is-invalid @enderror" name="recovery_code" required
                                    autocomplete="current-recovery_code" placeholder="xxxxxxxxxxxxxxxxxxxx">

                                @error('recovery_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-0 form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
