@extends('layouts.main-forms-carcass')

@section('create-edit')
    @yield('title-text')
    <div class="card-body">

        {{-- BLADE TURINYS --}}
        <form method="POST" action="{{ route($directionName . '.update', [$model]) }}">
            @method('PUT')
            @csrf

            @include($directionName . '.form')

        </form>

    </div>
    </div>
@endsection
