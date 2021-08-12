@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update PERSON</div>
                    <div class="card-body">

                        {{-- BLADE TURINYS --}}
                        <form method="POST" action="{{ route('person.update', [$person]) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name', $person->name) }}">
                                <small class="form-text text-muted">Please enter person name</small>
                            </div>
                            <div class="form-group">
                                <label>Surname</label>
                                <input class="form-control" type="text" name="surname" value="{{ old('surname', $person->surname) }}">
                                <small class="form-text text-muted">Please enter person surname</small>
                            </div>
                            <div class="form-group">
                                <label>National identification number</label>
                                <input class="form-control" type="text" name="national_identification_number" value="{{ old('national_identification_number', $person->national_identification_number) }}">
                                <small class="form-text text-muted">Please enter person national identification number</small>
                            </div>

                            @csrf
                            <button type="submit" class="btn btn-primary">UPDATE</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
