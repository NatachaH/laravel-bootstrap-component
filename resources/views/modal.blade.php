<div {{ $attributes->merge(['class' => 'modal fade']) }} @if($isStatic) data-backdrop="static" @endif tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-{{ $size }} {{ $isCentered ? 'modal-dialog-centered' : '' }} {{ $scrollable ? 'modal-dialog-scrollable' : '' }} {{ $fullscreenClass() }}">
    <div class="modal-content">
      @if(!empty($title) || $closable)
        <div class="modal-header">
          <h5 class="modal-title">{{ $title }}</h5>
          @if($closable)
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="@lang('bs-component::button.close')"></button>
          @endif
        </div>
      @endif
      <div class="modal-body">
        {!! $slot !!}
      </div>
      @if($footer)
        <div class="modal-footer">
          {!! $footer !!}
        </div>
      @endif
    </div>
  </div>
</div>
