<div {{ $attributes->merge(['class' => 'modal modal-confirm fade']) }} data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-{{ $size }} {{ $isCentered ? 'modal-dialog-centered' : '' }} {{ $scrollable ? 'modal-dialog-scrollable' : '' }} {{ $fullscreenClass() }}">
    <div class="modal-content">

      <div class="modal-header">
        @if($icon)
          <i class="icon {{ $icon }} bg-{{ $color }} text-white"></i>
        @endif
        @if($title)
          <h5 class="modal-title text-{{ $color }}">{{ $title }}</h5>
        @endif
      </div>

      <div class="modal-body text-center">
        <form action="{{ $action }}" method="POST" @if($withFile) enctype="multipart/form-data" @endif>
          @csrf
          @method($method)
            {!! $slot !!}
            <button type="button" class="btn {{ $btnCancel['class'] }}" data-bs-dismiss="modal" aria-label="{{ $btnCancel['label'] }}">
              {!! $btnCancel['value'] !!}
            </button>
            <button type="submit" class="btn {{ $btnConfirm['class'] }}" aria-label="{{ $btnConfirm['label'] }}">
              <x-bs-loading class="d-none" type="border" size="sm" color="light"/>
              {!! $btnConfirm['value'] !!}
            </button>
        </form>
      </div>

      @if($footer)
        <div class="modal-footer">
          {!! $footer !!}
        </div>
      @endif
    </div>

  </div>
</div>
