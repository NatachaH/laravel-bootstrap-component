<fieldset {{ $attributes->merge(['class' => 'dynamic-fieldset']) }} data-min="{{ $min }}" data-max="{{ $max }}">

    <legend>{{ $legend }}</legend>

    <div class="dynamic-list">

      @forelse ($items as $item)
        <div class="d-flex align-items-end dynamic-item dynamic-item-current">

            @if($sortable)
              <button class="btn drag {{ $btnSortable['class'] }}" aria-label="{{ __($btnSortable['label']) }}">
                {!! $btnSortable['value'] ?? __($btnSortable['label']) !!}
              </button>
              <input type="hidden" class="dynamic-position" name="{{ $name.'_to_update['.$item->id.'][position]' }}" value="{{ $item->position }}"/>
            @endif

            @includeIf($listing)

            <div class="dynamic-item-btn btn-group-toggle ml-auto" data-toggle="buttons">
               <label class="btn {{ $btnDelete['class'] }}">
                   <input class="dynamic-delete" type="checkbox" name="{{ $name.'_to_delete[]' }}" value="{{ $item->id }}" aria-label="{{ __($btnDelete['label']) }}">
                   {!! $btnDelete['value'] ?? __($btnDelete['label']) !!}
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
        <button type="button" class="ml-auto btn dynamic-add {{ $btnAdd['class'] }}" aria-label="{{ __($btnAdd['label']) }}">{!! $btnAdd['value'] ?? __($btnAdd['label']) !!}</button>
    </div>

    <script type="text/template" data-template="dynamic-template">
      <div class="d-flex align-items-end dynamic-item">

        @if($sortable)
          <button class="btn drag {{ $btnSortable['class'] }}" aria-label="{{ __($btnSortable['label']) }}">
            {!! $btnSortable['value'] ?? __($btnSortable['label']) !!}
          </button>
          <input type="hidden" class="dynamic-position" name="{{ $name.'_to_add['.$key.'][position]' }}" />
        @endif

        @includeIf($template)

        <div class="dynamic-item-btn">
          <button type="button" class="btn dynamic-remove {{ $btnRemove['class'] }}" aria-label="{{ __($btnRemove['label']) }}">{!! $btnRemove['value'] ?? __($btnRemove['label']) !!}</button>
        </div>

      </div>
    </script>

</fieldset>
