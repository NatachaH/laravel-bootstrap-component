<fieldset {{ $attributes->merge(['class' => 'dynamic-fieldset']) }} data-min="{{ $min }}" data-max="{{ $max }}">

    <legend>{{ $legend }}</legend>

    <div class="dynamic-list">

      {!! $slot !!}

    </div>

    <div class="d-flex align-items-enter">
        @if($help)
          <small class="form-text text-muted">{{ $help }}</small>
        @endif

        @if($isActive)
          <button type="button" class="ml-auto btn dynamic-add {{ config('bs-component.dynamic.add.class') }}" aria-label="{{ $btnAdd }}">{!! config('bs-component.dynamic.add.value') ?? $btnAdd !!}</button>
        @endif
    </div>

    <script type="text/template" data-template="dynamic-template">

      <div class="d-flex align-items-end dynamic-item">

        {!! $template !!}

        @if($isActive)
          <div class="dynamic-item-btn">
            <button type="button" class="btn dynamic-remove {{ config('bs-component.dynamic.remove.class') }}" aria-label="{{ $btnRemove }}">{!! config('bs-component.dynamic.remove.value') ?? $btnRemove !!}</button>
          </div>
        @endif

      </div>

    </script>

</fieldset>
