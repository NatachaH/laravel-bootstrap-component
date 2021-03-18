@if($isInline) <div> @endif

  @foreach ($options as $key => $value)

    @if(is_array($value))

      <div {{ $attributes->merge(['class' => 'form-check-group '.($isInline ? 'form-check-group-inline' : '')]) }}>

        <label>{{ $key }}</label>
        @foreach ($value as $k => $val)

          <div class="form-check {{ $isInline ? 'form-check-inline' : '' }}">

            <input
              type="{{ $type }}"
              name="{{ $name }}"
              value="{{ $k }}"
              class="form-check-input @error($cleanName,$errorBag) is-invalid @enderror @if($errorRelated) @error($errorRelated,$errorBag) is-invalid @enderror @endif"
              id="{{ $idOption($k).'Field' }}"
              {{ $isDisabled || $isOptionDisabled($k) ? 'disabled' : '' }}
              {{ $isOptionChecked($k) ? 'checked' : '' }}
            />

            @if(($isDisabled || $isOptionDisabled($k)) && $isOptionChecked($k))
              <input type="hidden" name="disabled_{{ $name }}" value="{{ $k }}"/>
            @endif

            <label class="form-check-label" for="{{ $idOption($k).'Field' }}">
              {{ $val }}
            </label>

          </div>
        @endforeach

      </div>

    @else
      <div {{ $attributes->merge(['class' => 'form-check '.($isInline ? 'form-check-inline' : '')]) }}>

        <input
          type="{{ $type }}"
          name="{{ $name }}"
          value="{{ $key }}"
          class="form-check-input @error($cleanName,$errorBag) is-invalid @enderror @if($errorRelated) @error($errorRelated,$errorBag) is-invalid @enderror @endif"
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
    @endif



  @endforeach

@if($isInline) </div> @endif
