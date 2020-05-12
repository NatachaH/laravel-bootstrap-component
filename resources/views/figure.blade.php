<figure {{ $attributes->merge(['class' => 'figure']) }} >
  {!! $slot !!}
  <figcaption class="figure-caption text-{{ $align }}">{{ $caption }}</figcaption>
</figure>
