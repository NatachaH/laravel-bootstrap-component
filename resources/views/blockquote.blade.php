<blockquote {{ $attributes->merge(['class' => 'blockquote text-'.$align]) }}>
  <p class="mb-0">
    {!! $slot !!}
  </p>
  @isset($source)
    <footer class="blockquote-footer">
        {!! $source !!}
    </footer>
  @endisset
</blockquote>
