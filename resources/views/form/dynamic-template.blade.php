<fieldset {{ $attributes->merge(['class' => 'dynamic-fieldset']) }} data-min="{{ $min }}" data-max="{{ $max }}">

    <legend>{{ $legend }}</legend>

    @isset($before)
      {!! $before !!}
    @endisset

    <div class="dynamic-list">

      @forelse ($items as $item)
        <div class="d-flex align-items-end dynamic-item dynamic-item-current {{ $isItemDisabled($item->id) ? 'dynamic-item-disbaled' : ''}} {{ $isItemDeleted($item->id) ? 'dynamic-item-delete' : '' }}">

            @if($sortable)
              <button class="btn drag {{ $btnMove['class'] }}" type="button" aria-label="{{ __($btnMove['label']) }}">
                {!! $btnMove['value'] ?? __($btnMove['label']) !!}
              </button>
              <input type="hidden" class="dynamic-position" name="{{ $name.'_to_update['.$item->id.'][position]' }}" value="{{ $item->position }}"/>
            @endif

            @includeIf($listing)

            <div class="dynamic-item-btn ms-auto" >
               <button class="btn dynamic-delete {{ $btnDelete['class'] }}" {{ $isItemDisabled($item->id) ? 'disabled' : '' }}>
                   {!! $btnDelete['value'] ?? __($btnDelete['label']) !!}
               </button>
               <input class="dynamic-delete-checkbox d-none" type="checkbox" name="{{ $name.'_to_delete[]' }}" value="{{ $item->id }}" aria-label="{{ __($btnDelete['label']) }}" {{ $isItemDeleted($item->id) ? 'checked' : '' }}>
            </div>

        </div>
      @empty
          {!! $slot !!}
      @endforelse

      @foreach ($defaults as $defaultKey => $value)
          <div class="d-flex align-items-start dynamic-item dynamic-item-old">

            @if($sortable)
              <div class="dynamic-item-btn">
                <button class="btn drag {{ $btnMove['class'] }}" type="button" aria-label="{{ __($btnMove['label']) }}">
                  {!! $btnMove['value'] ?? __($btnMove['label']) !!}
                </button>
                <input type="hidden" class="dynamic-position" name="{{ $name.'_to_add['.$defaultKey.'][position]' }}" />
              </div>
            @endif

            @includeIf($template,['key' => $defaultKey, 'default' => $value])

            <div class="dynamic-item-btn">
              <button type="button" class="btn dynamic-remove {{ $btnRemove['class'] }}" aria-label="{{ __($btnRemove['label']) }}">{!! $btnRemove['value'] ?? __($btnRemove['label']) !!}</button>
            </div>

          </div>
      @endforeach

    </div>

    <div class="d-flex align-items-enter">
        @if($help)
          <small class="form-text">{!! $help !!}</small>
        @endif
        <button type="button" class="ms-auto btn dynamic-add {{ $isDynamic() ? '' : 'd-none' }} {{ $btnAdd['class'] }}" aria-label="{{ __($btnAdd['label']) }}">{!! $btnAdd['value'] ?? __($btnAdd['label']) !!}</button>
    </div>

    @isset($after)
      {!! $after !!}
    @endisset

    <script type="text/template" data-template="dynamic-template">
      <div class="d-flex align-items-start dynamic-item">

        @if($sortable)
          <div class="dynamic-item-btn">
            <button class="btn drag {{ $btnMove['class'] }}" type="button" aria-label="{{ __($btnMove['label']) }}">
              {!! $btnMove['value'] ?? __($btnMove['label']) !!}
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
