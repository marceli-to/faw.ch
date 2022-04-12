<article class="card is-home md:span-6">
  <a href="{{ route('page.event.calendar') }}" title="Zur Veranstaltung • {{$event->title}}">
    @if ($event->image)
      <x-image :maxSizes="[0 => [900,600]]" :image="$event->image" ratio="true" />
    @endif
    @if ($event->subtitle)
      <span class="card__topic">{{$event->subtitle}}</span>
    @endif
    <x-heading type="h2" title="{{ $event->date ? DateHelper::format($event->dateTime) : '' }}" subtitle="{{ $event->title }}" />
    @if ($event->abstract)
      {!! nl2br($event->abstract) !!}
    @endif
    <div class="mt-4x">
      <span class="anchor anchor--arrow">
        <x-icon type="arrow-right" />
        <span>Zur Veranstaltung</span>
      </a>
    </div>
  </a>
</article>