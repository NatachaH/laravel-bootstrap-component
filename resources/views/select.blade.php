<div {{ $attributes }}>

  @if($label)
    <label for="{{ $name.'Field' }}" class="form-label">{{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif</label>
  @endif

  <select
    class="form-select {{ $size }} @error($name) is-invalid @enderror"
    name="{{ $name }}"
    {{ $isMultiple ? 'multiple' : ''}}
    {{ $isDisabled ? 'disabled' : ''}}
    {{ $isRequired ? 'required' : ''}}
  >

    @foreach ($options as $key => $value)
      <option value="{{ $key }}" {{ $selected($key) }}>{{ $value }}</option>
    @endforeach
  
  </select>


  @if($help)
    <small id="{{ $name.'FieldHelp' }}" class="form-text text-muted">{{ $help }}</small>
  @endif

  @error($name)
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>
