<input
  type="text"
  name="{{ $name }}"
  value="{{ old($cleanName,$value) }}"
  class="form-control date-picker {{ !empty($size) ? 'form-control-'.$size : '' }} @error($cleanName,$errorBag) is-invalid @enderror @if($mode == 'range' && !empty($inputFrom) && !empty($inputTo)) @error($inputFrom,$errorBag) is-invalid @enderror @error($inputTo,$errorBag) is-invalid @enderror @endif @if($errorRelated) @error($errorRelated,$errorBag) is-invalid @enderror @endif @if($isDisabled) is-disabled @endif"
  id="{{ $cleanName.'Field' }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($help) aria-describedby="{{ $cleanName.'FieldHelp' }}" @endif
  {{ $isReadonly ? 'readonly' : '' }}
  {{ $isDisabled ? 'disabled' : ''}}
  {{ $isRequired ? 'required' : ''}}
  @if(!$autocomplete) autocomplete="no" @endif
  data-mode="{{ $mode }}"
  data-format="{{ $format }}"
  data-min="{{ $min }}"
  data-max="{{ $max }}"
  data-disabled="{{ json_encode($disabledDates) }}"
  data-inline="{{ $inline }}"
  data-events="{{ json_encode($events) }}"
/>

<button class="btn btn-clear" aria-label="@lang('bs-component::button.clear')">
  <span aria-hidden="true">&times;</span>
</button>

@if($mode == 'range' && !empty($inputFrom) && !empty($inputTo))

  <input
    type="hidden"
    name="{{ $inputFrom }}"
    value="{{ old($inputFrom,$value) }}"
    class="datepicker-input-from @error($inputFrom,$errorBag) is-invalid @enderror"
    id="{{ $inputFrom.'Field' }}"
  />

  @error($inputFrom,$errorBag)
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror

  <input
    type="hidden"
    name="{{ $inputTo }}"
    value="{{ old($inputTo,$value) }}"
    class="datepicker-input-to @error($inputTo,$errorBag) is-invalid @enderror"
    id="{{ $inputTo.'Field' }}"
  />

  @error($inputTo,$errorBag)
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror

@endif


@if($inline)
  <div class="calendar"></div>
@endif
