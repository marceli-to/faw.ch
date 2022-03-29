<article class="card {{ $cssClass }}">
  
  @if ($event->image)
   <x-image :image="$event->image" maxWidth="900" maxHeight="600" ratio="3:2" />
  @endif
  
  @if ($event->subtitle)
    <span class="topic">{{$event->subtitle}}</span>
  @endif
  
  <h2>
    @if ($event->date) {{$event->dateFull}}@if ($event->time), {{$event->timeFull}} Uhr<br> <x-icon type="dash" />@endif @endif
    {{$event->title}}
  </h2>

  @if ($preview)
  
    @if ($event->abstract)
      {!! nl2br($event->abstract) !!}
    @endif
    
    <div class="mt-4x">
      <x-link-page url="test" target="_self" text="Zur Veranstaltung" title="{{$event->title}}" />
    </div>

  @else

    @if ($event->text)

      @if (Str::of($event->text)->wordCount() > 40)

        <div>{!! Str::words($event->text, 25, '...') !!}</div>
        <x-link-more text="Mehr" />
        <div style="display: none">
          {!! $event->text !!}
          @if ($event->files)
            @foreach($event->files as $file)
            <div>
              <x-link-file :file="$file" />
            </div>
            @endforeach
          @endif
          <x-link-less text="Weniger" />
        </div>

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
</article>