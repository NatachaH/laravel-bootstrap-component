<fieldset {{ $attributes }} class="dynamic" data-min="{{ $min }}" data-max="{{ $max }}">

    <legend>{{ $legend }}</legend>

    @if($currentItems)
      <div class="list-group">
        @foreach ($currentItems as $key => $current)
          <div class="list-group-item d-flex align-items-center dynamic-current">

            @includeIf($folder.'.dynamic.current')

            <div class="btn-group-toggle ml-auto" data-toggle="buttons">
              <label class="btn btn-sm btn-danger active">
                  <input class="dynamic-delete" type="checkbox" name="{{ $deleteName }}" value="{{ $current->id }}"> @lang('bs::dynamic.delete')
              </label>
            </div>

          </div>
        @endforeach
      </div>
    @endif

    <div class="dynamic-list"></div>

    @if($isDynamic)
      <button type="button" class="btn btn-sm dynamic-add btn-primary" aria-label="@lang('bs::dynamic.add')">@lang('bs::dynamic.add')</button>
    @endif

    <script type="text/template" data-template="dynamic-template">

      <div class="d-flex align-items-end dynamic-item">

        @includeIf($folder.'.dynamic.form')

        @if($isDynamic)
          <div class="flex-shrink-1 mb-1">
            <button type="button" class="btn btn-sm dynamic-remove btn-danger" aria-label="@lang('bs::dynamic.remove')">@lang('bs::dynamic.remove')</button>
          </div>
        @endif

      </div>

    </script>

</fieldset>
