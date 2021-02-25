<input
  type="file"
  name="{{ $name }}"
  class="form-control {{ !empty($size) ? 'form-control-'.$size : '' }} @error($cleanName,$errorBag) is-invalid @enderror @error($error,$errorBag) is-invalid @enderror"
  id="{{ $cleanName.'Field' }}"
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isMultiple ? 'multiple' : ''}}
  {{ $isRequired ? 'required' : ''}}
/>
