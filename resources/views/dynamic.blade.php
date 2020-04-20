<fieldset {{ $attributes->merge(['class' => 'dynamic dynamic-fieldset']) }} data-min="{{ $min }}" data-max="{{ $max }}">

    <legend>{{ $legend }}</legend>

    <div class="dynamic-list">

      {!! $slot !!}

    </div>

    @if($isActive)
      <button type="button" class="btn btn-sm dynamic-add {{ $btnAdd['class'] ?? 'btn-primary' }}" aria-label="{{ $btnAdd['label'] ?? 'Add' }}">{!! $btnAdd['value'] ?? 'Add' !!}</button>
    @endif

    <script type="text/template" data-template="dynamic-template">

      <div class="d-flex align-items-end dynamic-item">

        {!! $template !!}

        @if($isActive)
          <div class="flex-shrink-1 mb-1">
            <button type="button" class="btn btn-sm dynamic-remove {{ $btnRemove['class'] ?? 'btn-danger' }}" aria-label="{{ $btnRemove['label'] ?? 'Remove' }}">{!! $btnRemove['value'] ?? 'Remove' !!}</button>
          </div>
        @endif

      </div>

    </script>

</fieldset>
