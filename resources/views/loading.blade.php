<div {{ $attributes->merge(['class' => 'spinner-'.$type.' spinner-'.$type.'-'.$size.' text-'.$color]) }} role="status" aria-label="{{ $title }}">
  <span class="visually-hidden">{{ $title }}</span>
</div>
