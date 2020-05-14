<textarea
  name="{{ $name }}"
  class="form-control @error($cleanName()) is-invalid @enderror"
  id="{{ $name.'Field' }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($help) aria-describedby="{{ $name.'FieldHelp' }}" @endif
  {{ $isReadonly ? 'readonly' : '' }}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
>{{ old($name,$value) }}</textarea>
