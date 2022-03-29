<article class="text-media md:span-6">
  @if ($event->image)
   <x-image :image="$event->image" maxWidth="900" maxHeight="600" ratio="3:2" />
  @endif
  @if ($event->subtitle)
    <span class="topic">{{$event->subtitle}}</span>
  @endif
  <h2>
    @if ($event->date) 
      {{$event->dateFull}}@if ($event->time), {{$event->timeFull}} Uhr<br> <x-icon type="dash" />@endif 
    @endif
    {{$event->title}}
  </h2>
  @if ($preview)
    @if ($event->abstract)
      {!! nl2br($event->abstract) !!}
    @endif
  @else
    @if ($event->text)
      {!! $event->text !!}
    @endif
  @endif
  <div class="{{ $preview ? 'mt-4x' : '' }}">
    <x-link-page url="test" target="_self" text="Zur Veranstaltung" title="{{$event->title}}" />
  </div>
</article>