@extends('users.main')

@section('create-edit')
<div class="card-header">Edit User</div>
    <div class="card-body">

        {{-- BLADE TURINYS --}}
        <form method="POST" action="{{ route('users.update', [$user]) }}">
            @method('PUT')
            @csrf

            @include('users.form')

        </form>

    </div>
</div>
@endsection
