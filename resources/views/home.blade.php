@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ config('app.name') }}</div>

                <div class="card-body">
                    <ol>
                        <li>Modul User</li>
                        <li>Modul Profile</li>
                        <li>Modul Auth</li>
                        <li>Modul Two Factor Auth</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
