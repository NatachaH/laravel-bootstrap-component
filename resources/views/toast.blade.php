<div {{ $attributes->merge(['class' => 'toast']) }} role="alert" aria-live="assertive" aria-atomic="true" data-delay="{{ $delay }}" data-autohide="{{ $autohide ? 'true' : 'false' }}" >
  @if(!empty($img) || !empty($title) || !empty($time) || $closable)
    <div class="toast-header">
      @isset($img)
        <img src="{{ $img }}" class="rounded mr-2" alt="{{ $title }}">
      @endisset
      <strong class="mr-auto">{{ $title }}</strong>
      @isset($time)
        <small>{{ $time }}</small>
      @endisset
      @if($closable)
        <button type="button" class="ml-2 mb-1 btn-close" data-dismiss="toast" aria-label="@lang('bs-component::button.close')"></button>
      @endif
    </div>
  @endif
  <div class="toast-body">
    {!! $slot !!}
  </div>
</div>
