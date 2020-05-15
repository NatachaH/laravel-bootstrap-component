<div {{ $attributes }}>

  @if($label)
    <label for="{{ $cleanName.'Field' }}" class="form-label">{{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif</label>
  @endif

  @if(!empty($isInputGroup))
    <div class="input-group">
        @isset($before)
          {!! $before !!}
        @endisset

        @includeIf($field)

        @isset($after)
          {!! $after !!}
        @endisset
    </div>
  @else
    @includeIf($field)
  @endif

  @if($help)
    <small id="{{ $cleanName.'FieldHelp' }}" class="form-text text-muted">{{ $help }}</small>
  @endif

  @error($cleanName)
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror

</div>
