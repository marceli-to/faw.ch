@extends('layout.web')
@section('content')
@if ($hero)
  <x-hero :hero="$hero" />
@endif
<section class="content">
  <div>
    <div class="grid grid-home grid-cols-12">
      @if ($grid_items['events'])
        @foreach($grid_items['events'] as $item)
          <x-card-event :event="$item->event" preview="TRUE" cssClass="is-home md:span-6" />
        @endforeach
      @endif
      @if ($grid_items['teasers'])
        @foreach($grid_items['teasers'] as $item)
          <x-card-teaser :teaser="$item->teaser" cssClass="is-home md:span-6 lg:span-4" />
        @endforeach
      @endif
    </div>
  </div>
</section>
@endsection