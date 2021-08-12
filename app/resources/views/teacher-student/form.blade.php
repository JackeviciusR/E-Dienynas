

<div class="form-group">
    <label>Username</label>
    <input class="form-control" type="text" name="username" value=
    @if(isset($model)) "{{ old('username', $model->username) }}"
    @else "{{ old('username') }}" @endif >
    <small class="form-text text-muted">Please enter username</small>
</div>
<div class="form-group">
    <label>E-mail</label>
    <input class="form-control" type="text" name="email" value=
    @if(isset($model)) "{{ old('email', $model->email) }}"
    @else "{{ old('email') }}" @endif >
    <small class="form-text text-muted">Please enter email</small>
</div>
<div class="form-group">
    <label>Role</label>
    <select class="form-control" name="role_id">
        @foreach ($roles as $role)
            @if($directionName=='teachers')
                @if($role->name == 'TEACHER')
                    <option value="{{$role->id}}"
                            selected >
                        {{$role->name}}
                    </option>
                @endif
            @endif
            @if($directionName=='students')
                @if($role->name == 'STUDENT')
                    <option value="{{$role->id}}"
                            selected >
                        {{$role->name}}
                    </option>
                @endif
             @endif
        @endforeach
    </select >
    <small class="form-text text-muted">Please select person role</small>
</div>
<div class="form-group">
    <label>Person</label>
    <select class="form-control" name="person_id">
        @foreach($persons as $person)
            <option value="{{$person->id}}">
                {{$person->surname}} {{$person->name}} | {{$person->national_identification_number}}
            </option>
        @endforeach
    </select>
    <small class="form-text text-muted">Please select (surname, name | national id)</small>
</div>
<div class="form-group">
    <label>School</label>
    <select class="form-control" name="person_id">

        @foreach($schools as $school)
            @if(!isset($model) || $model->school_id == null)
                <option value="{{$school->id}}">
                    {{$school->surname}} {{$school->name}} | {{$school->national_identification_number}}
                </option>
            @else
                @if($model->school_id == $school->id)
                    <option value="{{$school->id}}">
                        {{$school->surname}} {{$school->name}} | {{$school->national_identification_number}}
                    </option>
                @endif
            @endif
        @endforeach

    </select>
    <small class="form-text text-muted">Please select school</small>
</div>

@if(!isset($model))
    <div class="form-group">
        <label>Password</label>
        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
        <small class="form-text text-muted">Please enter user password</small>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        <small class="form-text text-muted">Please repeat user password</small>
    </div>
@endif

<button type="submit" class="btn btn-primary">Submit</button>
