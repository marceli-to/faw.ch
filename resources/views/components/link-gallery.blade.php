@if ($gallery)
<a href="/galerie/{{ $page }}/{{ $gallery->id }}/{{ $gallery->slug }}" class="anchor anchor--arrow mb-2x" target="_self" title="{{ $gallery->title ? $gallery->title : '' }}" data-id="{{ $gallery->slug }}">
  <x-icon type="arrow-right" />
  <span>{{ $gallery->link_text }}</span>
</a>
@endif