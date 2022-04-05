<figure class="{{ $wrapperClass ?? '' }}">
  <img 
    src="/img/cache/{{ $image->name }}/{{ $maxWidth }}/{{ $maxHeight }}/{{ $image->coords }}/{{ $ratio }}" 
    width="{{ $maxWidth }}" 
    height="{{ $maxHeight }}"
    title="{{ $image->title }}"
    class="is-responsive">
  @if ($showCaption)
    @if ($image->caption)
      <figcaption>
        @if ($image->caption) {{ $image->caption }} @endif
      </figcaption>
    @endif
  @endif
</figure>