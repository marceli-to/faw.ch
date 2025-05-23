<figure class="{{ $wrapperClass ?? '' }}">

  @if ($maxSizes)
    <picture>
      @foreach($maxSizes as $minWidth => $maxSize)
        @if ($minWidth > 0)
          <source media="(min-width: {{ $minWidth }}px)" data-srcset="/img/crop/{{ $image->name }}/{{ $maxSize}}/{{ $image->coords }}/{{ $ratio }}">
        @else
          <img 
            data-src="/img/crop/{{ $image->name }}/{{ $maxSize }}/{{ $image->coords }}/{{ $ratio }}" 
            width="{{ $width }}" 
            height="{{ $height }}"
            title="{{ $image->title }}"
            alt="{{ $image->title }}"
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
