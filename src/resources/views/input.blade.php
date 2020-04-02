<div {{ $attributes }}>

  @if($label)
    <label for="{{ $name.'Field' }}" class="form-label">{{ $label }}</label>
  @endif

  <input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ old($name,$value) }}"
    class="form-control {{ $size }} @error($name) is-invalid @enderror"
    id="{{ $name.'Field' }}"
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    @if($help) aria-describedby="{{ $name.'FieldHelp' }}" @endif
    {{ $readonly }}
    {{ $disabled }}
  />

  @if($help)
    <small id="{{ $name.'FieldHelp' }}" class="form-text text-muted">Laissez le champ vide si vous ne souhaitez pas le modifier.</small>
  @endif

  @error($name)
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>
