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

            <div class="dynamic-item-btn ml-auto" >
               <button class="btn dynamic-delete {{ $btnDelete['class'] }}">
                   {!! $btnDelete['value'] ?? __($btnDelete['label']) !!}
               </button>
               <input class="dynamic-delete-checkbox d-none" type="checkbox" name="{{ $name.'_to_delete[]' }}" value="{{ $item->id }}" aria-label="{{ __($btnDelete['label']) }}">
            </div>

        </div>
      @empty
          {!! $slot !!}
      @endforelse

      @foreach (old($name.'_to_add',[]) as $oldKey => $value)
        <div class="d-flex align-items-start dynamic-item dynamic-item-old">

          @if($sortable)
            <div class="dynamic-item-btn">
              <button class="btn drag {{ $btnSortable['class'] }}" aria-label="{{ __($btnSortable['label']) }}">
                {!! $btnSortable['value'] ?? __($btnSortable['label']) !!}
              </button>
              <input type="hidden" class="dynamic-position" name="{{ $name.'_to_add['.$oldKey.'][position]' }}" />
            </div>
          @endif

          @includeIf($template,['key' => $oldKey])

          <div class="dynamic-item-btn">
            <button type="button" class="btn dynamic-remove {{ $btnRemove['class'] }}" aria-label="{{ __($btnRemove['label']) }}">{!! $btnRemove['value'] ?? __($btnRemove['label']) !!}</button>
          </div>

        </div>
      @endforeach

    </div>

    <div class="d-flex align-items-enter">
        @if($help)
          <small class="form-text text-muted">{{ $help }}</small>
        @endif
        <button type="button" class="ml-auto btn dynamic-add {{ $isDynamic() ? '' : 'd-none' }} {{ $btnAdd['class'] }}" aria-label="{{ __($btnAdd['label']) }}">{!! $btnAdd['value'] ?? __($btnAdd['label']) !!}</button>
    </div>

    <script type="text/template" data-template="dynamic-template">
      <div class="d-flex align-items-start dynamic-item">

        @if($sortable)
          <div class="dynamic-item-btn">
            <button class="btn drag {{ $btnSortable['class'] }}" aria-label="{{ __($btnSortable['label']) }}">
              {!! $btnSortable['value'] ?? __($btnSortable['label']) !!}
            </button>
            <input type="hidden" class="dynamic-position" name="{{ $name.'_to_add['.$key.'][position]' }}" />
          </div>
        @endif

        @includeIf($template)

        <div class="dynamic-item-btn {{ $isDynamic() ? '' : 'd-none' }}">
          <button type="button" class="btn dynamic-remove {{ $btnRemove['class'] }}" aria-label="{{ __($btnRemove['label']) }}">{!! $btnRemove['value'] ?? __($btnRemove['label']) !!}</button>
        </div>

      </div>
    </script>

</fieldset>
