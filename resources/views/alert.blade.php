<div {{ $attributes->merge(['class' => 'alert alert-'.$color.' '.($closable ? 'alert-dismissible' : '')]) }}>

  {!! $slot !!}

  @if($closable)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="@lang('bs-component::button.close')"></button>
  @endif

</div>
