@extends('layout.web')
@section('content')
<section class="content is-first">
  <div>
    <h1>Archiv</h1>
    @if ($events)
      @foreach($events as $periode => $eventsYear)
        <div class="collapsible {{ $loop->last ? 'is-last' : '' }} {{ $loop->first ? 'is-expanded' : '' }} js-clpsbl">
          <h2>
            <a href="javascript:;" class="btn-collapsible js-clpsbl-btn">
              <span>{{$periode}}</span>
              <x-icon type="chevron-down" />
              <x-icon type="chevron-up" />
            </a>
          </h2>
          <div class="grid grid-cols-12 js-clpsbl-body" style="display: {{ $loop->first ? 'grid' : 'none' }}">
            @foreach($eventsYear as $event)
              <x-card-event :event="$event" cssClass="card-small md:span-6 lg:span-4" />
            @endforeach
            @if (array_key_exists($periode, $programFiles))
              <article class="card-small">
                @foreach($programFiles[$periode] as $file)
                  <a href="/storage/uploads/{{ $file->name }}" class="anchor anchor--file" target="_blank" title="{{ $file->caption ?? 'Download' }}">
                    <x-icon type="file" />
                    <span class="text-bold text-uc">{{ $file->caption ?? 'Download' }}</span>
                  </a>
                @endforeach
              </article>
            @endif
          </div>
        </div>
      @endforeach
    @endif
  </div>
</section>
@endsection