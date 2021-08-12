@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <h2>Schools</h2>

                    </div>

                    <div class="card-body">

                        <div class="card-body">
                            <h6>Filterable Table</h6>
                            <input id="myInput" type="text" placeholder="Search..">
                            <small class="form-text text-muted">to search the table for first names, last names or emails:</small>
                            <br><br>
                        </div>

                        <form method="POST" action="{{route('students.store')}}">
{{--                            @csrf--}}
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach ($models as $key => $model)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input checkbox" type="checkbox" name="id[{{$key}}]" value="{{$model->id}}" id="row_id">
                                                <label class="form-check-label" for="flexCheckChecked"></label>
                                            </div>
                                        </th>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{$model->name}}</td>
                                        <td>{{$model->address}}</td>
                                        <td>{{$model->city ?? null}}</td>
                                        <td scope="col" >
                                            <a href="{{route($directionName . '.edit',[$model])}}" class="btn btn-outline-info btn-sm">EDIT</a>
                                        </td>
                                        <td scope="col">
                                            <form method="POST" action="{{ route( $directionName . '.destroy', [$model] ) }}">
                                                @method('DELETE')
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
