@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5 class="font-weight-bold">Profil Pegawai</h5>
            <p>Kemaskini maklumat akaun dan alamat E-mel rasmi</p>
        </div>
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ route('profile.update',$user) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="name">{{ __('name Pegawai') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name ?? null) }}" autocomplete="name"
                                    autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nric">{{ __('No Kad Pengenalan') }}</label>
                                <input id="nric" type="text" class="form-control @error('nric') is-invalid @enderror" name="nric" value="{{ old('nric', $user->nric ?? null) }}" autocomplete="nric"
                                    onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="12" minlength="12" pattern="[0-9]{12}">
                                @error('nric')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">E-mel Rasmi</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email ?? null) }}"
                                    autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="office">No Telefon Pejabat</label>
                                <input id="office" type="text" class="form-control @error('office') is-invalid @enderror" name="office"
                                    value="{{ old('office', $user->office ?? null) }}" autocomplete="office" autofocus>
                                @error('office')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">No Telefon Bimbit</label>
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                    value="{{ old('mobile', $user->mobile ?? null) }}" autocomplete="mobile" autofocus>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Kemaskini</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
