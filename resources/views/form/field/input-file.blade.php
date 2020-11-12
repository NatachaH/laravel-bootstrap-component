<input
  type="file"
  name="{{ $name }}"
  class="form-control {{ !empty($size) ? 'form-control-'.$size : '' }} @error($cleanName) is-invalid @enderror"
  id="{{ $cleanName.'Field' }}"
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isMultiple ? 'multiple' : ''}}
  {{ $isRequired ? 'required' : ''}}
/>
