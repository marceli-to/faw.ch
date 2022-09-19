@extends('layout.web')
@section('content')
@if ($hero)
  <section class="content-visual">
    <div>
      <x-image 
        :maxSizes="[1200 => 1800, 0 => 1200]" 
        width="1200"
        height="800"
        :image="$hero" 
        ratio="3x2" 
        wrapperClass="visual is-full-height"
      />
    </div>
    <a href="javascript:;" class="btn-visual" data-scroll-to="content" title="Scrollen">
      <x-icon type="chevron-down-lg" />
    </a>
  </section>
@endif
<section class="content">
  <div>
    @if ($grid_items['events']->count())
      <div class="grid grid-home grid-cols-12">
        @foreach($grid_items['events'] as $item)
          @if ($item->event)
            <x-card-event-teaser :event="$item->event" />
          @endif
        @endforeach
      </div>
    @endif
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