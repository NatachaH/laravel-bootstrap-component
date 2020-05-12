<div {{ $attributes->merge(['class' => 'spinner-'.$type.' text-'.$color]) }} role="status" aria-label="{{ $title }}">
  <span class="sr-only">{{ $title }}</span>
</div>
