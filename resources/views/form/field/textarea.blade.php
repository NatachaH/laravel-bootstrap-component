<textarea
  name="{{ $name }}"
  class="form-control @error($cleanName,$errorBag) is-invalid @enderror @if($errorRelated) @error($errorRelated,$errorBag) is-invalid @enderror @endif"
  id="{{ $cleanName.'Field' }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isReadonly ? 'readonly' : '' }}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
>{{ old($cleanName,$value) }}</textarea>
