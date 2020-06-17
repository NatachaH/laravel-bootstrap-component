<figure {{ $attributes->merge(['class' => 'text-'.$align]) }}>
  <blockquote class="blockquote">
    <p>
      {!! $slot !!}
    </p>
  </blockquote>
  @isset($source)
    <figcaption class="blockquote-footer">
      {!! $source !!}
    </figcaption>
  @endisset
</figure>
