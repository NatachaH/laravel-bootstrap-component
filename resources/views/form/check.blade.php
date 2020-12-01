<div {{ $attributes->merge(['class' => 'form-check']) }}>

  @if($isBoolean)
    <input type="hidden" value="{{ $value ? '0' : '1' }}" name="{{ $name }}"/>
  @endif

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
    <small id="{{ $id.'FieldHelp' }}" class="form-text">{!! $help !!}</small>
  @endif

  @error($name)
    <span class="invalid-feedback" role="alert">
        {{ $message }}
    </span>
  @enderror

</div>
