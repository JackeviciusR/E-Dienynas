@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <h2>Lessons</h2>

                    </div>

                    <div class="card-body">

                        <div class="card-body">
                            <h6>Filterable Table</h6>
                            <input id="myInput" type="text" placeholder="Search..">
                            <small class="form-text text-muted">to search the table for first names, last names or emails:</small>
                            <br><br>
                        </div>

                        <table class="table table-hover">
                            <thead class="">
                            <tr>
                                <th scope="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked"></label>
                                    </div>
                                </th>
                                <th scope="col" class="align-self-sm-start">#</th>
                                <th scope="col">Name</th>
                            </tr>
                            </thead>
                            <tbody id="myTable">
                            @foreach ($models as $model)
                                <tr>

                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="id" value="" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked"></label>
                                        </div>
                                    </th>
                                    <th scope="row">1</th>
                                    <td>{{$model->name}}</td>
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

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
