<textarea
  name="{{ $name }}"
  class="form-control @error($cleanName,$errorBag) is-invalid @enderror @error($error,$errorBag) is-invalid @enderror"
  id="{{ $cleanName.'Field' }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isReadonly ? 'readonly' : '' }}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
>{{ old($cleanName,$value) }}</textarea>
