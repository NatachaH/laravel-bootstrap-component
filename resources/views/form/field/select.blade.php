<select
  class="form-select {{ !empty($size) ? 'form-select-'.$size : '' }} @error($cleanName,$errorBag) is-invalid @enderror @error($error,$errorBag) is-invalid @enderror"
  name="{{ $name }}"
  {{ $isMultiple ? 'multiple' : ''}}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
>

  @foreach ($options as $key => $value)
    @if(is_array($value))
      <optgroup label="{{ $key }}">
        @foreach ($value as $k => $val)
          <option value="{{ $k }}" {{ $isOptionSelected($k) ? 'selected' : '' }} {{ $isOptionDisabled($k) ? 'disabled' : '' }}>{{ $val }}</option>
        @endforeach
      </optgroup>
    @else
      <option value="{{ $key }}" {{ $isOptionSelected($key) ? 'selected' : '' }} {{ $isOptionDisabled($key) ? 'disabled' : '' }}>{{ $value }}</option>
    @endif
  @endforeach

</select>

@if($isDisabled && !empty($values))
  <input type="hidden" name="disabled_{{ $name }}" value="{{ $values }}"/>
@endif
