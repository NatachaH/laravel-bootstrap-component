<div {{ $attributes->merge(['class' => 'card']) }}>

  @isset($title)
    <h5 class="card-header">{{ $title }}</h5>
  @endisset

  @isset($before)
    {!! $before !!}
  @endisset

  @if(!empty(trim($slot)))
    <div class="card-body">
      {!! $slot !!}
    </div>
  @endif

  @isset($after)
    {!! $after !!}
  @endisset

  @isset($footer)
    <div class="card-footer">
      {!! $footer !!}
    </div>
  @endisset

</div>
