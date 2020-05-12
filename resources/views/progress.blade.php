<div {{ $attributes->merge(['class' => 'progress']) }}>
  <div class="progress-bar bg-{{ $color }} {{ $isStripped ? 'progress-bar-striped' : ''}} {{ $isAnimated ? 'progress-bar-animated' : ''}}" role="progressbar" style="width: {{ $value.'%' }} " aria-valuenow="{{ $value }}" aria-valuemin="{{ $min }}" aria-valuemax="{{ $max }}">
    {{ $caption }}
  </div>
</div>
