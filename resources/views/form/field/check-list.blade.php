{{-- Bootstrap 5
@foreach ($options as $key => $value)

  <div {{ $attributes->merge(['class' => 'form-check']) }}>

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
--}}

@foreach ($options as $key => $value)

  <div {{ $attributes->merge(['class' => 'custom-control custom-'.$type]) }}>

    <input
      type="{{ $type }}"
      name="{{ $name }}"
      value="{{ $key }}"
      class="custom-control-input @error($name) is-invalid @enderror"
      id="{{ $idOption($key).'Field' }}"
      {{ $isDisabled || $isOptionDisabled($key) ? 'disabled' : '' }}
      {{ $isOptionChecked($key) ? 'checked' : '' }}
    />

    @if(($isDisabled || $isOptionDisabled($key)) && $isOptionChecked($key))
      <input type="hidden" name="disabled_{{ $name }}" value="{{ $key }}"/>
    @endif

    <label class="custom-control-label" for="{{ $idOption($key).'Field' }}">
      {{ $value }}
    </label>

  </div>

@endforeach
