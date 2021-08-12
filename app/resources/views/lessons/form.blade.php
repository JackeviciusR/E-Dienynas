
<div class="form-group">
    <label>School name</label>
    <input class="form-control" type="text" name="name" value=
    @if(isset($model)) "{{ old('name', $model->name) }}"
    @else "{{ old('name') }}" @endif >
    <small class="form-text text-muted">Please enter lesson name (required)</small>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
