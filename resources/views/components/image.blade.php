<figure class="{{ $wrapperClass ?? '' }}">

  @if ($maxSizes)
    <picture>
      @foreach($maxSizes as $minWidth => $maxSize)
        @if ($minWidth > 0)
          <source media="(min-width: {{ $minWidth }}px)" data-srcset="/img/cache/{{ $image->name }}/{{ $maxSize[0] }}/{{ $maxSize[1] }}/{{ $image->coords }}/{{ $ratio }}">
        @else
          <img 
            data-src="/img/cache/{{ $image->name }}/{{ $maxSize[0] }}/{{ $maxSize[1] }}/{{ $image->coords }}/{{ $ratio }}" 
            width="{{ $maxSize[0] }}" 
            height="{{ $maxSize[1] }}"
            title="{{ $image->title }}"
            class="is-responsive lazy">
        @endif
      @endforeach
    </picture>
  @endif
  @if ($showCaption)
    @if ($image->caption)
      <figcaption>
        @if ($image->caption) {{ $image->caption }} @endif
      </figcaption>
    @endif
  @endif
</figure>
