@extends('layouts.main-forms-carcass')

@section('create-edit')
    @yield('title-text')
    <div class="card-body">

        <form method="POST" action="{{ route( $directionName . '.store' ) }}">
            @csrf

            @include( $directionName . '.form' )

        </form>

    </div>
    </div>
@endsection
