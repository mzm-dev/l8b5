{{-- Merujuk kepada layout --}}
@extends('layouts.app')

@section('title','User')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card bg-light">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title">@yield('title')</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                </div>
                <div class="col-md-8">

                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $user->updated_at->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td>

                                <form action="{{ route('user.destroy',$user) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-warning btn-sm" href="{{ route('user.edit',$user) }}">Kemaskini</a>
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th>Two factor Authentication</th>
                            <td>
                                @if (session('status') == "two-factor-authentication-disabled")
                                <div class="alert alert-success" role="alert">
                                    Two factor Authentication has been disabled.
                                </div>
                                @endif

                                @if (session('status') == "two-factor-authentication-enabled")
                                <div class="alert alert-success" role="alert">
                                    Two factor Authentication has been enabled.
                                </div>
                                @endif


                                <form method="POST" action="{{ route('two-factor.enable') }}">
                                    @csrf

                                    @if (auth()->user()->two_factor_secret)
                                    @method('DElETE')

                                    <div class="pb-5">
                                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                    </div>

                                    <div>
                                        <h3>Recovery Codes:</h3>

                                        <ul>
                                            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                            <li>{{ $code }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <button class="btn btn-danger">Disable</button>
                                    @else
                                    <button class="btn btn-primary">Enable</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
