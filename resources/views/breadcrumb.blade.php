@isset($items)
  <nav {{ $attributes }} aria-label="breadcrumb">
    <ol class="breadcrumb">

      @foreach ($items as $key => $item)

          @if($loop->last)
            <li class="breadcrumb-item active" aria-current="page">{{ $key }}</li>
          @else
            <li class="breadcrumb-item"><a href="{{ Route::has($item) ? route($item) : $item }}">{{ $key }}</a></li>
          @endif

      @endforeach

    </ol>
  </nav>
@endisset
