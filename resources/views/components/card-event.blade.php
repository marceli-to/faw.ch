<article class="card {{ $cssClass }}">
  @if (!$event->past || $event->sticky)
    @if ($event->image)
      <x-image :maxSizes="[0 => 900]" width="900" height="600" :image="$event->image" ratio="3x2" />
    @endif
  @endif
  @if ($event->subtitle)
    <span class="card__topic">{{$event->subtitle}}</span>
  @endif
  @if ($event->past && !$event->sticky)
    <x-heading type="h3" title="{{ $event->date ? DateHelper::format($event->dateFull) : '' }}" subtitle="{{ $event->title }}" />
  @elseif ($event->sticky)
    <x-heading type="h2" title="{{ $event->title }}" />
  @else
    <x-heading type="h2" title="{{ $event->date ? DateHelper::format($event->dateTime) : '' }}" subtitle="{{ $event->title }}" />
  @endif

  @if ($event->past && !$event->sticky)
    @if ($event->text)
      <x-truncated-text>
          @if ($event->image)
            <x-image :maxSizes="[0 => 900]" width="900" height="600" :image="$event->image" ratio="3x2" />
          @endif

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
      @if (Str::of($event->text)->wordCount() > 30)
        <x-truncated-text preview="{!! Str::words($event->text, 30, ' ...') !!}">
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
</article>