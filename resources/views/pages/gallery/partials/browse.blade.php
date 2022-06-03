<nav class="lightbox {{ $class ?? $class }}">
  <div class="lightbox__hover">
    <div data-hover-prev style="display: none">
      @if (isset($browse['prev']))
        @if ($browse['prev']['gallery']->hover_text)
          {{ $browse['prev']['gallery']->hover_text }}
        @else
          {{ $browse['prev']['gallery']->link_text }}
        @endif
      @endif
    </div>
    <div data-hover-next style="display: none">
      @if (isset($browse['next']))
        @if ($browse['next']['gallery']->hover_text)
          {{ $browse['next']['gallery']->hover_text }}
        @else
          {{ $browse['next']['gallery']->link_text }}
        @endif
      @endif
    </div>
  </div>
  <ul>
    <li>
      @if (isset($browse['prev']))
        <a 
          href="{{ route('page.gallery', 
            [
              'page' => $browse['prev']['page']->slug, 
              'article' => $browse['prev']['article']->id, 
              'gallery' => $browse['prev']['gallery']->id, 
              'gallery_slug' => $browse['prev']['gallery']->slug
            ]
          )}}"
          title="{{ $browse['prev']['gallery']->title }}"
          data-hover="data-hover-prev">
          <x-icon type="chevron-left" />
        </a>
      @endif
    </li>
    <li>
      @if (isset($browse['next']))
        <a 
          href="{{ route('page.gallery', 
            [
              'page' => $browse['next']['page']->slug, 
              'article' => $browse['next']['article']->id, 
              'gallery' => $browse['next']['gallery']->id, 
              'gallery_slug' => $browse['next']['gallery']->slug
            ]
          )}}"
          title="{{ $browse['next']['gallery']->title }}"
          data-hover="data-hover-next">
          <x-icon type="chevron-right" />
        </a>
      @endif
    </li>
  </ul>
  @if ($hasClose)
    <a href="/{{ $page->slug }}/#{{$gallery->slug}}" class="btn-lightbox-close" title="Zurück">
      <x-icon type="cross-lightbox" />
    </a>
    {{-- <a href="javascript:history.back();" class="btn-lightbox-close" title="Zurück">
      <x-icon type="cross-lightbox" />
    </a> --}}
  @endif
</nav>