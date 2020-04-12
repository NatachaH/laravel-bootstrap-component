<div {{ $attributes->merge(['class' => 'form-check']) }}>

  <input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    class="form-check-input @error($name) is-invalid @enderror"
    id="{{ $name.'Field' }}"
    {{ $isDisabled ? 'disabled' : ''}}
    {{ $isChecked ? 'checked' : ''}}
  />

  <label class="form-check-label" for="{{ $name.'Field' }}">
    {{ $label }}
  </label>

</div>
