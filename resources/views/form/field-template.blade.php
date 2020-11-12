<div {{ $attributes }}>

  @if($label)
    <label for="{{ $cleanName.'Field' }}" class="form-label">{{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif</label>
  @endif

  @if($before or $after or isset($isInputGroup))
    <div class="input-group">
        @isset($before)
          <span class="input-group-text">{!! $before !!}</span>
        @endisset

        @includeIf($field)

        @isset($after)
          <span class="input-group-text">{!! $after !!}</span>
        @endisset
    </div>
  @else
    @includeIf($field)
  @endif

  @if($help)
    <small id="{{ $cleanName.'FieldHelp' }}" class="form-text">{{ $help }}</small>
  @endif

  @error($cleanName)
      <span class="invalid-feedback">
          {{ $message }}
      </span>
  @enderror

</div>
