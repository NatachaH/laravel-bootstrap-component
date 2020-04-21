<div {{ $attributes->merge(['class' => 'card']) }}>

  @isset($title)
    <h5 class="card-header">{{ $title }}</h5>
  @endisset

  @isset($before)
    {!! $before !!}
  @endisset

  @isset($slot)
    <div class="card-body">
      {!! $slot !!}
    </div>
  @endisset

  @isset($after)
    {!! $after !!}
  @endisset

  @isset($footer)
    <div class="card-footer">
      {!! $footer !!}
    </div>
  @endisset

</div>
