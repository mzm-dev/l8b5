
{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card bg-light">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                </div>
                <div class="col-md-8">
                    <form class="card" action="{{ route('user.update', $user) }}" method="POST" novalidate>
                        @method('PUT')
                        @csrf


                        @include('user._form')

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

