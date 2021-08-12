@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h2>Users</h2>

                    </div>

                    <div class="card-body">

                        <div class="card-body">
                            <h6>Filterable Table</h6>
                            <input id="myInput" type="text" placeholder="Search..">
                            <small class="form-text text-muted">to search the table for first names, last names or emails:</small>
                            <br><br>
                        </div>

                        <form method="POST" action="{{route('students.store')}}">
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
                                    <th scope="col">Username</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">National Id</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">School</th>
                                    <th scope="col">Role</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody id="myTable">
                                @foreach ($models as $key=>$model)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input checkbox" type="checkbox" name="id[{{$key}}]" value="{{$model->id}}" id="row_id">
                                                <label class="form-check-label" for="flexCheckChecked"></label>
                                            </div>
                                        </th>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$model->username  ?? null}}</td>
                                        <td>{{$model->person->surname  ?? null}}</td>
                                        <td>{{$model->person->name  ?? null}}</td>
                                        <td>{{$model->person->national_identification_number  ?? null}}</td>
                                        <td>{{$model->email}}</td>
                                        <td>{{$model->school->name ?? null}}</td>
                                            @if($model->role_id==1)
                                            <td class="text-primary font-weight-bold">{{$model->role->name ?? null}}</td>
                                            @elseif($model->role_id==2)
                                            <td class="text-secondary font-weight-bold">{{$model->role->name ?? null}}</td>
                                            @elseif($model->role_id==3)
                                            <td class="text-success font-weight-bold">{{$model->role->name ?? null}}</td>
                                            @elseif($model->role_id==4)
                                            <td class="text-danger font-weight-bold">{{$model->role->name ?? null}}</td>
                                            @elseif($model->role_id==5)
                                            <td class="text-info font-weight-bold">{{$model->role->name ?? null}}</td>
                                            @endif
                                        <td scope="col" >
                                            <a href="{{route($directionName . '.edit',[$model])}}" class="btn btn-outline-info btn-sm">EDIT</a>
                                        </td>
                                        <td scope="col">
                                            <form method="POST" action="{{route($directionName . '.destroy', [$model])}}">
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


{{--                    <div class="card-body">--}}

{{--                        --}}{{-- BLADE TURINYS --}}

{{--                        <ul class="list-group">--}}
{{--                            @foreach ($users as $user)--}}
{{--                                <li class="list-group-item list-line">--}}
{{--                                    <div class="list-line__users">--}}
{{--                                        <div class="list-line__users__name">--}}
{{--                                            {{$user->username}}--}}
{{--                                        </div>--}}
{{--                                        <div class="list-line__users__kind">--}}
{{--                                            {{$user->person->name ?? null}} {{$user->person->surname ?? null}}--}}
{{--                                        </div>--}}
{{--                                        <div class="list-line__users__kind">--}}
{{--                                            {{$user->role->name}}--}}
{{--                                        </div>--}}
{{--                                        <div class="list-line__users__kind">--}}
{{--                                            {{$user->email}}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="list-line__buttons">--}}

{{--                                        --}}{{-- <a href="{{route('users.show',[$users])}}" class="btn btn-info">SHOW</a> --}}

{{--                                        <a href="{{ route('users.edit',[$user]) }}" class="btn btn-info">EDIT</a>--}}

{{--                                        <form method="POST" action="{{ route('users.destroy', $user) }}" >--}}
{{--                                            @method('DELETE')--}}
{{--                                            @csrf--}}
{{--                                            <button type="submit" class="btn btn-danger">DELETE</button>--}}
{{--                                            <input name="_method" type="submit" class="btn btn-danger" value="DELETE">--}}
{{--                                        </form>--}}

{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}

{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
