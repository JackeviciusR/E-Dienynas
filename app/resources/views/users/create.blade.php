@extends('users.main')

@section('create-edit')
    <div class="card-header">Create new User</div>
    <div class="card-body">

        {{-- BLADE TURINYS --}}
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            @include('users.form')

        </form>

    </div>
    </div>
@endsection
