<div {{ $attributes->merge(['class' => 'alert alert-'.$color]) }}>

  {!! $slot !!}

  @if($closable)
    <button type="button" class="close" data-dismiss="alert" aria-label="@lang('bs-component::button.close')">
      <span aria-hidden="true">&times;</span>
    </button>
  @endif

</div>
