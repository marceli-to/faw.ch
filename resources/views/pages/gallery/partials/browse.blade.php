<nav class="lightbox {{ $class ?? $class }}">
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
          title="{{ $browse['prev']['gallery']->title }}">
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
          title="{{ $browse['next']['gallery']->title }}">
          <x-icon type="chevron-right" />
        </a>
      @endif
    </li>
  </ul>
  @if ($hasClose)
    <a href="/{{ $page->slug }}/#{{$gallery->slug}}" class="btn-lightbox-close" title="Zurück">
      <x-icon type="cross-lightbox" />
    </a>
  @endif
</nav>