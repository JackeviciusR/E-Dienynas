@extends('teacher-student.carcass')

@section('create-edit')
    @yield('title-text')
    <div class="card-body">

        <form method="POST" action="{{ route( $directionName . '.store' ) }}">
            @csrf

            @include( 'teacher-student.form' )
        </form>

    </div>
    </div>
@endsection
