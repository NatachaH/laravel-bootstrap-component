<figure {{ $attributes->merge(['class' => 'figure']) }} >
  {!! $slot !!}
  @if($caption)
    <figcaption class="figure-caption text-{{ $align }}">{{ $caption }}</figcaption>
  @endif
</figure>
