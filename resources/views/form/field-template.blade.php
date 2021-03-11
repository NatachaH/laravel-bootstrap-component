<div {{ $attributes }}>

  @if($label)
    <label for="{{ $cleanName.'Field' }}" class="form-label">{{ $label }} @if($isRequired) <i class="text-muted">*</i> @endif</label>
  @endif

  @if($before or $after or !empty($isInputGroup))
    <div class="input-group @isset($before) input-group-with-before @endisset @isset($after) input-group-with-after @endisset">
        @isset($before)
          @if(has_html($before,'i|b'))
            {!! $before !!}
          @else
            <span class="input-group-text">{!! $before !!}</span>
          @endif
        @endisset

        @includeIf($field)

        @isset($after)
          @if(has_html($after,'i|b'))
            {!! $after !!}
          @else
            <span class="input-group-text">{!! $after !!}</span>
          @endif
        @endisset

        @error($cleanName,$errorBag)
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror

    </div>
  @else
    @includeIf($field)

    @error($cleanName,$errorBag)
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  @endif

  @if($help)
    <small id="{{ $cleanName.'FieldHelp' }}" class="form-text">{!! $help !!}</small>
  @endif

  @if($errorRelated)
    @error($errorRelated,$errorBag)
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  @endif

</div>
