@foreach ($options as $key => $value)

  <div class="form-check">

    <input
      type="{{ $type }}"
      name="{{ $name }}"
      value="{{ $key }}"
      class="form-check-input @error($name) is-invalid @enderror"
      id="{{ $idOption($key).'Field' }}"
      {{ $isDisabled || $isOptionDisabled($key) ? 'disabled' : '' }}
      {{ $isOptionChecked($key) ? 'checked' : '' }}
    />

    @if(($isDisabled || $isOptionDisabled($key)) && $isOptionChecked($key))
      <input type="hidden" name="disabled_{{ $name }}" value="{{ $key }}"/>
    @endif

    <label class="form-check-label" for="{{ $idOption($key).'Field' }}">
      {{ $value }}
    </label>

  </div>

@endforeach
