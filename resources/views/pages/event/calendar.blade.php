@extends('layout.web')
@section('content')
<section class="content is-first">
  <div>
    <h1>Kalender</h1>
    @if ($events['upcoming'] || $events['sticky'])
      <div class="grid-cols-12">
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
      <div class="grid-cols-12 is-last">
        <article class="card-small md:span-6 lg:span-4">
          <h2>Weitere Veranstaltungen in Winterthur</h2>
          <x-link-page url="https://marceli.to" target="_blank" text="baukulturwinterthur.ch" title="baukulturwinterthur.ch" />
          <x-link-page url="https://marceli.to" target="_blank" text="unser-bahnhof-winterthur.ch" title="unser-bahnhof-winterthur.ch" />
        </article>
      </div>
    @endif
  </div>
</section>
<section class="content">
  <div>
    <h2>Vergangene Veranstaltungen</h2>
  </div>
</section>
@endsection