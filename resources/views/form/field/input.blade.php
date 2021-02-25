<input
  type="{{ $type }}"
  name="{{ $name }}"
  value="{{ old($cleanName,$value) }}"
  class="form-control {{ !empty($size) ? 'form-control-'.$size : '' }} @error($cleanName,$errorBag) is-invalid @enderror @error($error,$errorBag) is-invalid @enderror"
  id="{{ $cleanName.'Field' }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isReadonly ? 'readonly' : '' }}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
  @if($type=='number')
    step="{{ $step }}"
    min="{{ $min }}"
    max="{{ $max }}"
  @endif
/>
