<div {{ $attributes->merge(['class' => 'toast']) }} role="alert" aria-live="assertive" aria-atomic="true" @isset($delay) data-delay="{{ $delay }}" data-autohide="true" @endisset>
  <div class="toast-header">
    @isset($img)
      <img src="{{ $img }}" class="rounded mr-2" alt="{{ $title }}">
    @endisset
    <strong class="mr-auto">{{ $title }}</strong>
    @isset($time)
      <small>{{ $time }}</small>
    @endisset
    @isset($closable)
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="@lang('bs-component::button.close')">
        <span aria-hidden="true">&times;</span>
      </button>
    @endisset
  </div>
  <div class="toast-body">
    {!! $slot !!}
  </div>
</div>
