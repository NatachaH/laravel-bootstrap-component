<select
  class="form-select {{ !empty($size) ? 'form-select-'.$size : '' }} @error($cleanName,$errorBag) is-invalid @enderror @if($errorRelated) @error($errorRelated,$errorBag) is-invalid @enderror @endif @if($isDisabled || $isReadonly) is-disabled @endif"
  name="{{ $name }}"
  id="{{ $cleanName.'Field' }}"
  {{ $isMultiple ? 'multiple' : ''}}
  {{ $isDisabled || $isReadonly ? 'disabled' : ''}}
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

@if($isReadonly && !empty($optionsSelected))
  @foreach ($optionsSelected as $key => $optionSelected)
    <input type="hidden" name="{{ $name }}" value="{{ is_bool($optionSelected) ? ($optionSelected ? '1' : '0') : $optionSelected }}"/>
  @endforeach
@endif
