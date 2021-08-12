@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h2>Persons</h2>

                    </div>

                    <div class="card-body">

                        <div class="card-body">
                            <h2>Filterable Table</h2>
                            <p>Type something in the input field to search the table for first names, last names or emails:</p>
                            <input id="myInput" type="text" placeholder="Search..">
                            <br><br>
                        </div>

                        <form method="POST" action="{{route('students.store')}}">
                            @csrf
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Students</button>
                            </div>

                            <table class="table table-hover">
                                <thead class="">
                                <tr>
                                        <th scope="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="select_all">
                                                <label class="form-check-label" for="flexCheckChecked"></label>
                                            </div>
                                        </th>
                                        <th scope="col" class="align-self-sm-start">#</th>
                                        <th scope="col">Surname</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">National Id</th>
                                        @foreach($roles as $role)
                                            <th scope="col">{{$role->name}}</th>
                                        @endforeach
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($persons as $key=>$person)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input checkbox" type="checkbox" name="id[{{$key}}]" value="{{$person->id}}" id="row_id">
                                                    <label class="form-check-label" for="flexCheckChecked"></label>
                                                </div>
                                            </th>
                                            <th scope="row">{{$key + 1}}</th>
                                            <td>{{$person->surname}}</td>
                                            <td>{{$person->name}}</td>
                                            <td>{{$person->national_identification_number}}</td>
                                            @foreach($person->getRolesArr() as $role => $value)
                                                @if($value)
                                                    <td class="text-center"><i class="bi bi-check-square-fill"></i></td>
                                                @else
                                                    <td></td>
                                                @endif
                                            @endforeach
                                            <td scope="col" >
                                                <a href="{{route('person.edit',[$person])}}" class="btn btn-outline-info btn-sm">EDIT</a>
                                            </td>
                                            <td scope="col">
                                                <form method="POST" action="{{route('person.destroy', [$person])}}">
    {{--                                                @method('DELETE')--}}
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
