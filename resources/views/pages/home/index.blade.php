@extends('layout.web')
@section('content')
@if ($hero)
  <section class="content-visual">
    <div>
      <x-image 
        :maxSizes="[1200 => [1800,1200], 0 => [1200,800]]" 
        :image="$hero" 
        ratio="true" 
        wrapperClass="visual is-full-height"
      />
    </div>
    <a href="javascript:;" class="btn-visual" data-scroll-to="content">
      <x-icon type="chevron-down-lg" />
    </a>
  </section>
@endif
<section class="content">
  <div>
    <div class="grid grid-home grid-cols-12">
      @if ($grid_items['events'])
        @foreach($grid_items['events'] as $item)
          @if ($item->event)
            <x-card-event-teaser :event="$item->event" />
          @endif
        @endforeach
      @endif
    </div>
    <div class="grid grid-home grid-cols-12">
      @if ($grid_items['teasers'])
        @foreach($grid_items['teasers'] as $item)
          <x-card-teaser :teaser="$item->teaser" />
        @endforeach
      @endif
    </div>
  </div>
</section>
@endsection