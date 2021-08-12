

<div class="form-group">
    <label>Username</label>
    <input class="form-control" type="text" name="username" value=
    @if(isset($model)) "{{ old('username', $model->username) }}"
    @else "{{ old('username') }}" @endif >
    <small class="form-text text-muted">Please enter person name</small>
</div>
<div class="form-group">
    <label>E-mail</label>
    <input class="form-control" type="text" name="email" value=
    @if(isset($model)) "{{ old('email', $model->email) }}"
    @else "{{ old('email') }}" @endif >
    <small class="form-text text-muted">Please enter person surname</small>
</div>
<div class="form-group">
    <label>Role</label>
    <select class="form-control" name="role_id">
        @foreach ($roles as $role)
                    @if($role->name == 'TEACHER')
                <option value="{{$role->id}}"
                        selected >
                    {{$role->name}}
                </option>
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
    <small class="form-text text-muted">Please select person (surname, name | national id)</small>
</div>
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

<button type="submit" class="btn btn-primary">Submit</button>
