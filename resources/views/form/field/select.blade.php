{{-- Bootstrap 5
<select
  class="form-select {{ !empty($size) ? 'form-select-'.$size : '' }} @error($cleanName) is-invalid @enderror"
  name="{{ $name }}"
  {{ $isMultiple ? 'multiple' : ''}}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
>

  @foreach ($options as $key => $value)
    <option value="{{ $key }}" {{ $isOptionSelected($key) ? 'selected' : '' }} {{ $isOptionDisabled($key) ? 'disabled' : '' }}>{{ $value }}</option>
  @endforeach

</select>

@if($isDisabled && !empty($values))
  <input type="hidden" name="disabled_{{ $name }}" value="{{ $values }}"/>
@endif
--}}

<select
  class="custom-select {{ !empty($size) ? 'custom-select-'.$size : '' }} @error($cleanName) is-invalid @enderror"
  name="{{ $name }}"
  {{ $isMultiple ? 'multiple' : ''}}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
>

  @foreach ($options as $key => $value)
    <option value="{{ $key }}" {{ $isOptionSelected($key) ? 'selected' : '' }} {{ $isOptionDisabled($key) ? 'disabled' : '' }}>{{ $value }}</option>
  @endforeach

</select>

@if($isDisabled && !empty($values))
  <input type="hidden" name="disabled_{{ $name }}" value="{{ $values }}"/>
@endif
