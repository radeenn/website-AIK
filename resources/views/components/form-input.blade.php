@props(['label', 'name', 'type' => 'text', 'value' => '', 'required' => false, 'hint' => null])
<label class="form-field">
    <span class="form-label">{{ $label }} @if($required)<b aria-hidden="true">*</b>@endif</span>
    @if($type === 'textarea')
        <textarea name="{{ $name }}" rows="4" {{ $required ? 'required' : '' }} {{ $attributes->merge(['class' => 'form-control']) }}>{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" {{ $required ? 'required' : '' }} {{ $attributes->merge(['class' => 'form-control']) }}>
    @endif
    @if($hint)<span class="form-hint">{{ $hint }}</span>@endif
    @error($name)<span class="form-error">{{ $message }}</span>@enderror
</label>
