
<div class="form-group">
    <label>School name</label>
    <input class="form-control" type="text" name="name" value=
    @if(isset($model)) "{{ old('name', $model->name) }}"
    @else "{{ old('name') }}" @endif >
    <small class="form-text text-muted">Please enter school name (required)</small>
</div>
<div class="form-group">
    <label>City</label>
    <input class="form-control" type="text" name="city" value=
    @if(isset($model)) "{{ old('city', $model->city) }}"
    @else "{{ old('city') }}" @endif >
    <small class="form-text text-muted">Please enter school city (required)</small>
</div>
<div class="form-group">
    <label>Address</label>
    <input class="form-control" type="text" name="address" value=
    @if(isset($model)) "{{ old('address', $model->address) }}"
    @else "{{ old('address') }}" @endif >
    <small class="form-text text-muted">Please enter school address (required)</small>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
