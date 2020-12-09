@if($title)

  <div {{ $attributes->merge(['class' => 'toast']) }} role="alert" aria-live="assertive" aria-atomic="true" data-delay="{{ $delay }}" data-autohide="{{ $autohide ? 'true' : 'false' }}" >

      <div class="toast-header">

        @isset($img)
          <img src="{{ $img }}" class="rounded me-2" alt="{{ $title }}">
        @endisset

        <strong class="me-auto">{{ $title }}</strong>

        @isset($time)
          <small>{{ $time }}</small>
        @endisset

        @if($closable)
          <button type="button" class="ms-2 mb-1 btn-close" data-bs-dismiss="toast" aria-label="@lang('bs-component::button.close')"></button>
        @endif

      </div>

      <div class="toast-body">
        {!! $slot !!}
      </div>

  </div>

@else

  <div {{ $attributes->merge(['class' => 'toast d-flex align-items-center']) }} role="alert" aria-live="assertive" aria-atomic="true" data-delay="{{ $delay }}" data-autohide="{{ $autohide ? 'true' : 'false' }}" >

      <div class="toast-body">

        @isset($img)
          <img src="{{ $img }}" class="rounded me-2" alt="{{ $title }}">
        @endisset

        {!! $slot !!}

        @isset($time)
          <small>{{ $time }}</small>
        @endisset

      </div>

      @if($closable)
        <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="@lang('bs-component::button.close')"></button>
      @endif

  </div>

@endif
