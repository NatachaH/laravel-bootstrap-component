<div {{ $attributes->merge(['class' => 'bs-calendar '.(!empty($color) ? 'bs-calendar-'.$color : '')]) }} @if($eventsLoadUrl) data-events="{{ $eventsLoadUrl }}" @endif>
  <div class="header">
    <div class="month">
      <button class="prev" aria-label="@lang('bs-component::calendar.prev-month')" title="@lang('bs-component::calendar.prev-month')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" >
          <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
        </svg>
      </button>
      <span></span>
      <button class="next" aria-label="@lang('bs-component::calendar.next-month')" title="@lang('bs-component::calendar.next-month')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
        </svg>
      </button>
    </div>
    <div class="year">
      <button class="prev" aria-label="@lang('bs-component::calendar.prev-year')" title="@lang('bs-component::calendar.prev-year')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" >
          <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
        </svg>
      </button>
      <span></span>
      <button class="next" aria-label="@lang('bs-component::calendar.next-year')" title="@lang('bs-component::calendar.next-year')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
        </svg>
      </button>
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th>@lang('bs-component::calendar.monday')</th>
        <th>@lang('bs-component::calendar.tuesday')</th>
        <th>@lang('bs-component::calendar.wednesday')</th>
        <th>@lang('bs-component::calendar.thursday')</th>
        <th>@lang('bs-component::calendar.friday')</th>
        <th>@lang('bs-component::calendar.saturday')</th>
        <th>@lang('bs-component::calendar.sunday')</th>
      </tr>
    </thead>
    <tbody class="dates"></tbody>
  </table>
</div>
