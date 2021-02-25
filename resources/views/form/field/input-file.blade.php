<input
  type="file"
  name="{{ $name }}"
  class="form-control {{ !empty($size) ? 'form-control-'.$size : '' }} @error($cleanName,$errorBag) is-invalid @enderror @if($errorRelated) @error($errorRelated,$errorBag) is-invalid @enderror @endif"
  id="{{ $cleanName.'Field' }}"
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isMultiple ? 'multiple' : ''}}
  {{ $isRequired ? 'required' : ''}}
/>
