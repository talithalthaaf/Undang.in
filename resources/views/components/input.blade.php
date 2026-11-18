@props(['name', 'label', 'type' => 'text', 'required' => false])

<div class="field">
    <label for="{{ $name }}" class="field-label">
        {{ $label }} @if($required)<span class="field-req">*</span>@endif
    </label>

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ $type === 'password' ? '' : old($name) }}"
        @required($required)
        {{ $attributes->class(['field-input', 'is-invalid' => $errors->has($name)]) }}
    >

    @error($name)
        <p class="field-error">{{ $message }}</p>
    @enderror
</div>