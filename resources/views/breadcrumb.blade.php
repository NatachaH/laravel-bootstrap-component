@if(!empty($links))
  <nav {{ $attributes }} aria-label="breadcrumb">
    <ol class="breadcrumb">

      @foreach ($links as $key => $value)

          @if($loop->last)
            <li class="breadcrumb-item active" aria-current="page">{{ $key }}</li>
          @else
            <li class="breadcrumb-item"><a href="{{ route($value) }}">{{ $key }}</a></li>
          @endif

      @endforeach

    </ol>
  </nav>
@endif
