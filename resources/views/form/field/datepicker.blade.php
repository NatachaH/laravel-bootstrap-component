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
  @if(!$autocomplete) autocomplete="off" @endif
  data-mode="{{ $mode }}"
  data-format="{{ $format }}"
  data-min="{{ $min }}"
  data-max="{{ $max }}"
  data-disabled="{{ json_encode($disabledDates) }}"
  data-inline="{{ $inline }}"
  data-static="{{ $static }}"
  data-events="{{ json_encode($events) }}"
/>

<button class="btn btn-clear" aria-label="@lang('bs-component::button.clear')">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
    <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
  </svg>
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
