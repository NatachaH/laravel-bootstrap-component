<div {{ $attributes->merge(['class' => 'form-check']) }}>

  <input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ old($name,$value) }}"
    class="form-check-input @error($name) is-invalid @enderror"
    id="{{ $name.'Field' }}"
    {{ $isDisabled ? 'disabled' : ''}}
  />

  <label class="form-check-label" for="{{ $name.'Field' }}">
    {{ $label }}
  </label>

</div>
