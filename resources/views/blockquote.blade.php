<figure {{ $attributes->merge(['class' => 'text-'.$align]) }}>
  <blockquote class="blockquote">
    {!! $slot !!}
  </blockquote>
  @isset($source)
    <figcaption class="blockquote-footer">
        {!! $source !!}
    </figcaption>
  @endisset
</figure>
