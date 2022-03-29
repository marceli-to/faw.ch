<figure class="{{ $wrapperClass ?? '' }}">
  <img 
    src="/img/cache/{{ $image->name }}/{{ $maxWidth }}/{{ $maxHeight }}/{{ $image->coords }}/{{ $ratio }}" 
    width="{{ $maxWidth }}" 
    height="{{ $maxHeight }}"
    title="{{ $image->title }}">
</figure>