
<div class="form-group">
    <label>Username</label>
    <input class="form-control" type="text" name="username" value=
        @if(isset($user)) "{{ old('username', $user->username) }}"
        @else "{{ old('username') }}" @endif >
    <small class="form-text text-muted">Please enter person name</small>
</div>
<div class="form-group">
    <label>E-mail</label>
    <input class="form-control" type="text" name="email" value=
        @if(isset($user)) "{{ old('email', $user->email) }}"
        @else "{{ old('email') }}" @endif >
    <small class="form-text text-muted">Please enter person surname</small>
</div>
<div class="form-group">
    <label>Role</label>
    <select class="form-control" name="role_id">
        <option value="null" selected> ------- select menu ------- </option>
        @foreach ($roles as $role)
            <option value="{{$role->id}}"
                @if(isset($user))
                    @if($role->id == $user->role_id || $role->id == old('role_id'))
                        selected
                    @endif
                @else
                    @if($role->id == old('role_id'))
                        selected
                    @endif
                @endif >
                {{$role->name}}
            </option>
        @endforeach
    </select>
    <small class="form-text text-muted">Please select person role</small>
</div>
<div class="form-group">
    <label>Person</label>
    <select class="form-control" name="person_id">
        <option value="null" selected> ------- select menu ------- </option>
        @foreach ($persons as $person)
            <option value="{{$person->id}}"
                @if(isset($user))
                    @if($person->id == $user->person_id || $person->id == old('person_id'))
                        selected
                    @endif
                @else
                    @if($person->id == old('person_id'))
                        selected
                    @endif
                @endif >
                     {{$person->surname}} {{$person->name}} | {{$person->national_identification_number}}
            </option>
        @endforeach
{{--        <option value="null" selected> ------- select menu ------- </option>--}}
    </select>
    <small class="form-text text-muted">Please select person (surname, name | national id)</small>
</div>
<div class="form-group">
    <label>School</label>
    <select class="form-control" name="school_id">
        <option value="null" selected> ------- select menu ------- </option>
        @foreach ($schools as $school)
            <option value="{{$school->id}}"
                @if(isset($user))
                    @if($school->id == $user->school_id || $school->id == old('school_id'))
                        selected
                    @endif
                @else
                    @if($school->id == old('school_id'))
                        selected
                    @endif
                @endif >
                     {{$school->city}} | {{$school->name}} | {{$school->address}}
            </option>
        @endforeach
{{--        <option value="null" selected> ------- select menu ------- </option>--}}
    </select>
    <small class="form-text text-muted">Please select school</small>
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
