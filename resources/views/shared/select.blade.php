@php
$class ??= null;
$name ??= '';
$value ??= collect($value); // pour éviter les erreurs si $value est une array
$label ??= ucfirst($name);
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple class="form-select">
        @foreach($options as $k => $v)
            <option value="{{ $k }}" @selected($value->contains($k))>{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>