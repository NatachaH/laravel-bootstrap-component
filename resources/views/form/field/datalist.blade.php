<input
  type="text"
  name="{{ $name }}"
  value="{{ old($cleanName,$value) }}"
  class="form-control {{ !empty($size) ? 'form-control-'.$size : '' }} @error($cleanName,$errorBag) is-invalid @enderror @if($errorRelated) @error($errorRelated,$errorBag) is-invalid @enderror @endif @if($isDisabled) is-disabled @endif"
  list="{{ $cleanName.'FieldOptions' }}"
  id="{{ $cleanName.'Field' }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isReadonly ? 'readonly' : '' }}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
  @if(!$autocomplete) autocomplete="off" @endif
/>

@if($withHidden)
  <input type="hidden" id="{{ $cleanHiddenName.'Field' }}" class="input-hidden" name="{{ $hiddenName }}" value="{{ old($cleanHiddenName,$hiddenValue) }}">
@endif

<datalist id="{{ $cleanName.'FieldOptions' }}">
  @foreach ($options as $key => $value)
    <option data-value="{{ $key }}" value="{{ $value }}">{{ $value }}</option>
  @endforeach
</datalist>
