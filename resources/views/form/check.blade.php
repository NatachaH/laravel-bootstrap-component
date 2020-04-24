{{-- Bootstrap 5
<div {{ $attributes->merge(['class' => 'form-check']) }}>

  <input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    class="form-check-input @error($name) is-invalid @enderror"
    id="{{ $id.'Field' }}"
    {{ $isDisabled ? 'disabled' : ''}}
    {{ $isRequired ? 'required' : ''}}
    {{ $isChecked ? 'checked' : ''}}
  />

  @if($isDisabled && $isChecked)
    <input type="hidden" name="disabled_{{ $name }}" value="{{ $value }}"/>
  @endif

  <label class="form-check-label" for="{{ $id.'Field' }}">
    {{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif
  </label>

  @if($help)
    <small id="{{ $id.'FieldHelp' }}" class="form-text text-muted">{{ $help }}</small>
  @endif

  @error($name)
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
  @enderror

</div>
--}}

<div {{ $attributes->merge(['class' => 'custom-control custom-'.$type]) }}>

  <input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    class="custom-control-input @error($name) is-invalid @enderror"
    id="{{ $id.'Field' }}"
    {{ $isDisabled ? 'disabled' : ''}}
    {{ $isRequired ? 'required' : ''}}
    {{ $isChecked ? 'checked' : ''}}
  />

  @if($isDisabled && $isChecked)
    <input type="hidden" name="disabled_{{ $name }}" value="{{ $value }}"/>
  @endif

  <label class="custom-control-label" for="{{ $id.'Field' }}">
    {{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif
  </label>

  @if($help)
    <small id="{{ $id.'FieldHelp' }}" class="form-text text-muted">{{ $help }}</small>
  @endif

  @error($name)
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
  @enderror

</div>
