{{-- Merujuk kepada layout --}}
@extends('layouts.app')

{{-- Merujuk kepada yield content dalam layout --}}
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Users
            <a class="btn bg-blue-dark float-end" href="{{ route('user.create') }}"><i class="bi bi-plus-circle" role="img"></i> New</a>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- Looping Data --}}
                    @php($index = $users->firstItem())
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            @if ($user->email_verified_at)
                            {{ 'Approved' }}
                            @else
                            <form action="{{ route('user.pengesahan',$user) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk sahkan akaun?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm">Menunggu</button>
                            </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('user.destroy',$user) }}" method="POST" onsubmit="return confirm('Adakah anda pasti untuk hapuskan data ini?');">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-primary btn-sm" href="{{ route('user.show',$user) }}">Butiran</a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('user.edit',$user) }}">Kemaskini</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                                </form>
                        </td>
                    </tr>
                    @empty
                    {!! '<div class="alert alert-warning" role="alert">Tiada maklumat pengguna</div>' !!}
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(count($users) > 0)
            {{-- Pagination button link --}}
            {{ $users->links() }}
            @endif
        </div>
    </div>
</div>


@endsection
