<div>
  <div class="btn-group" role="group">
    @foreach ($options as $key => $option)
        <input type="radio" class="btn-check" name="{{ $name }}" value="{{ $key }}" id="{{ $cleanName.'-'.$key }}-outlined" @if(old($cleanName,$value) == $key) checked @endif {{ $isDisabled ? 'disabled' : '' }}>
        <label class="btn btn-outline-{{ $key }}" for="{{ $cleanName.'-'.$key }}-outlined">{{ $option }}</label>
    @endforeach
  </div>
</div>
