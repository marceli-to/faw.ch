<article class="card {{ $cssClass }}">
  @if (!$event->past || $event->sticky)
    @if ($event->image)
    <x-image :image="$event->image" maxWidth="900" maxHeight="600" ratio="3:2" />
    @endif
  @endif
  @if ($event->subtitle)
    <span class="card__topic">{{$event->subtitle}}</span>
  @endif
  @if ($event->past)
    <h3>
      @if ($event->date) {{ DateHelper::format($event->dateFull) }}<br> <x-icon type="dash" />@endif
      {{$event->title}}
    </h3>
  @else
    <h2>
      @if ($event->date) {{ DateHelper::format($event->dateFull) }}@if ($event->time), {{$event->timeFull}} Uhr<br> <x-icon type="dash" />@endif @endif
      {{$event->title}}
    </h2>
  @endif
  @if ($preview && !$event->past)
    @if ($event->abstract)
      {!! nl2br($event->abstract) !!}
    @endif
    <div class="mt-4x">
      <x-link-page url="test" target="_self" text="Zur Veranstaltung" title="{{$event->title}}" />
    </div>
  @else
    @if ($event->past && !$event->sticky)
      @if ($event->text)
        <x-truncated-text>
            {!! $event->text !!}
            @if ($event->files)
              @foreach($event->files as $file)
              <div>
                <x-link-file :file="$file" />
              </div>
              @endforeach
            @endif
        </x-truncated-text>
      @endif
    @else
      @if ($event->text)
        
        @if (Str::of($event->text)->wordCount() > 25)
          <x-truncated-text preview="{!! Str::words($event->text, 25, '...') !!}">
            {!! $event->text !!}
            @if ($event->files)
              @foreach($event->files as $file)
              <div>
                <x-link-file :file="$file" />
              </div>
              @endforeach
            @endif
          </x-truncated-text>
        @else
          {!! $event->text !!}
          @if ($event->files)
            @foreach($event->files as $file)
              <x-link-file :file="$file" />
            @endforeach
          @endif
        @endif
      @endif
    @endif
  @endif
</article>