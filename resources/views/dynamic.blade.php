<fieldset {{ $attributes->merge(['class' => 'dynamic-fieldset']) }} data-min="{{ $min }}" data-max="{{ $max }}">

    <legend>{{ $legend }}</legend>

    <div class="dynamic-list">

      @forelse ($items as $key => $item)
        <div class="d-flex align-items-end dynamic-item dynamic-item-current">

            @includeIf($viewItem)

            <div class="dynamic-item-btn btn-group-toggle ml-auto" data-toggle="buttons">
               <label class="btn {{ $btnDelete['class'] }}">
                   <input class="dynamic-delete" type="checkbox" name="{{ $deleteName }}" value="{{ $item->id }}" aria-label="{{ $btnDelete['label'] }}">
                   {!! {{ $btnDelete['value'] ?? $btnDelete['label'] }} !!}
               </label>
            </div>
        </div>
      @empty
          {!! $slot !!}
      @endforelse

    </div>

    <div class="d-flex align-items-enter">
        @if($help)
          <small class="form-text text-muted">{{ $help }}</small>
        @endif
        <button type="button" class="ml-auto btn dynamic-add {{ $btnAdd['class'] }}" aria-label="{{ $btnAdd['label'] }}">{!! {{ $btnAdd['value'] ?? $btnAdd['label'] }} !!}</button>
    </div>

    <script type="text/template" data-template="dynamic-template">
      <div class="d-flex align-items-end dynamic-item">

        {!! $template !!}

        <div class="dynamic-item-btn">
          <button type="button" class="btn dynamic-remove {{ $btnRemove['class'] }}" aria-label="{{ $btnRemove['label'] }}">{!! $btnRemove['value'] ?? $btnRemove['label'] !!}</button>
        </div>

      </div>
    </script>

</fieldset>
