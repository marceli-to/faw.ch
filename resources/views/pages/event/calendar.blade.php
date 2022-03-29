@extends('layout.web')
@section('content')
<section class="content is-first">
  <div>
    <h1>Kalender</h1>
    @if ($events['upcoming'] || $events['sticky'])
      <div class="grid-cols-12 mb-16x md:mb-12x lg:mb-18x">
        @if ($events['upcoming'])
          @foreach($events['upcoming'] as $event)
            <x-card-event :event="$event" cssClass="md:span-6 lg:span-4" />
          @endforeach
        @endif
        @if ($events['sticky'])
          @foreach($events['sticky'] as $event)
            <x-card-event :event="$event" cssClass="md:span-6 lg:span-4" />
          @endforeach
        @endif
      </div>
      <div class="grid-cols-12">
        <article class="card-small">
          <h3>Weitere Veranstaltungen in Winterthur</h3>
          <x-link-page url="https://marceli.to" target="_blank" text="baukulturwinterthur.ch" title="baukulturwinterthur.ch" />
          <x-link-page url="https://marceli.to" target="_blank" text="unser-bahnhof-winterthur.ch" title="unser-bahnhof-winterthur.ch" />
        </article>
      </div>
    @endif
  </div>
</section>
<section class="content">
  <div>
    <h2 class="mb-8x md:mb-10x lg:mb-12x">Vergangene Veranstaltungen</h2>
    <div class="grid-cols-12">
      @foreach($events['past'] as $event)
        <x-card-event :event="$event" cssClass="card-small md:span-6 lg:span-4" />
      @endforeach
    </div>
    <div class="mt-10x md:mt-12x lg:mt-14x">
      <x-link-page url="{{ route('page.event.archive') }}" target="_self" text="Archiv" title="Archiv" />
    </div>
  </div>
</section>
@endsection