<div {{ $attributes->merge(['class' => 'bs-calendar '.(!empty($color) ? 'bs-calendar-'.$color : '')]) }} @if($eventsLoadUrl) data-events="{{ $eventsLoadUrl }}" @endif>
  <div class="header">
    <div class="month">
      <i class="prev icon-chevron-left" aria-label="@lang('bs-component::calendar.prev-month')" title="@lang('bs-component::calendar.prev-month')"></i>
      <span></span>
      <i class="next icon-chevron-right" aria-label="@lang('bs-component::calendar.next-month')" title="@lang('bs-component::calendar.next-month')"></i>
    </div>
    <div class="year">
      <i class="prev icon-chevron-left" aria-label="@lang('bs-component::calendar.prev-year')" title="@lang('bs-component::calendar.prev-year')"></i>
      <span></span>
      <i class="next icon-chevron-right" aria-label="@lang('bs-component::calendar.next-year')" title="@lang('bs-component::calendar.next-year')"></i>
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
