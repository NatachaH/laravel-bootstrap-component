<div {{ $attributes }}>
  @if($label)
    <label for="{{ $name }}Field" class="form-label">{{ $label }}</label>
  @endif
  <input type="{{ $type }}" name="{{ $name }}" class="form-control {{ $size }} @error($name) is-invalid @enderror" id="{{ $name }}Field" placeholder="{{ $placeholder }}" {{ $readonly }} {{ $disabled }}>
  @error($name)
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>
