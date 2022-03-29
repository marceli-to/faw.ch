@extends('layout.web')
@section('content')
@if ($hero)
  <x-hero :hero="$hero" />
@endif
<section class="content">
  <div>
    @if ($grid_items['events'])
      <div class="grid-cols-12">
        @foreach($grid_items['events'] as $item)
          <x-card-event :event="$item->event" preview="TRUE" />
        @endforeach
      </div>
    @endif

    @if ($grid_items['teasers'])
      <div class="grid-cols-12">
        @foreach($grid_items['teasers'] as $item)
          <x-card-teaser :teaser="$item->teaser" />
        @endforeach
      </div>
    @endif
  </div>
</section>
@endsection