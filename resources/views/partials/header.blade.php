<header class="site-header js-site-header">
  @if (request()->routeIs('page.event.workshop.show'))
    <div class="flex justify-end">
      <a href="/{{$page}}#{{$slug}}" class="btn-lightbox-close is-workshop" title="Zurück">
        <x-icon type="cross-lightbox" />
      </a>
    </div>
  @else
    <div>
      <a href="{{ route('page.index') }}" class="logo">
        <x-icon type="logo" />
      </a>
      <a href="javascript:;" class="btn-menu js-menu-btn">
        <x-icon type="burger" />
        <x-icon type="cross" />
      </a>
    </div>
  @endif
</header>