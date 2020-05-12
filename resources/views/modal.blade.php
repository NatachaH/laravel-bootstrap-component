<div {{ $attributes->merge(['class' => 'modal']) }}tabindex="-1" role="dialog">
  <div class="modal-dialog modal-{{ $size }} {{ $isCentered ? 'modal-dialog-centered' : '' }} {{ $scrollable ? 'modal-dialog-scrollable' : '' }} {{ $fullscreenClass() }}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $title }}</h5>
        @isset($closable)
          <button type="button" class="close" data-dismiss="modal" aria-label="@lang('bs-component::button.close')">
            <span aria-hidden="true">&times;</span>
          </button>
        @endisset
      </div>
      <div class="modal-body">
        {!! $slot !!}
      </div>
      @if(!empty(trim($footer)))
        <div class="modal-footer">
          {!! $footer !!}
        </div>
      @endif
    </div>
  </div>
</div>
