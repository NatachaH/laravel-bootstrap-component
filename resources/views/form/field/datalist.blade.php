<input
  type="text"
  name="{{ $name }}"
  value="{{ old($cleanName,$value) }}"
  class="form-control {{ !empty($size) ? 'form-control-'.$size : '' }} @error($cleanName) is-invalid @enderror"
  list="{{ $cleanName.'FieldOptions' }}"
  id="{{ $cleanName.'Field' }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isReadonly ? 'readonly' : '' }}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
/>

<datalist id="{{ $cleanName.'FieldOptions' }}">
  @foreach ($options as $key => $value)
    <option data-value="{{ $key }}">{{ $value }}</option>
  @endforeach
</datalist>
