<nav class="site js-menu">
  <div>
    <ul class="is-main">
      <li>
        <a href="javascript:;" class="{{ request()->routeIs('page.event.*') ? 'is-active' : '' }} js-menu-btn-toggle">Veranstaltungen</a>
        <ul style="display: {{ request()->routeIs('page.event.*') ? 'block' : 'none' }}">
          <li><a href="{{ route('page.event.calendar') }}" class="{{ request()->routeIs('page.event.calendar') ? 'is-active' : '' }}" title="Kalender">Kalender</a></li>
          <li><a href="{{ route('page.event.activities') . '/#jahresprogramm' }}" class="{{ request()->routeIs('page.event.activities') ? 'is-active' : '' }}" title="Jahresprogramm">Jahresprogramm</a></li>
          <li><a href="{{ route('page.event.station') }}" class="{{ request()->routeIs('page.event.station') ? 'is-active' : '' }}" title="Unser Bahnhof Winterthur">Unser Bahnhof Winterthur</a></li>
          <li><a href="{{ route('page.event.workshop') }}" class="{{ request()->routeIs('page.event.workshop') ? 'is-active' : '' }}" title="Stadtwerkstatt">Stadtwerkstatt</a></li>
          <li><a href="{{ route('page.event.archive') }}" class="{{ request()->routeIs('page.event.archive') ? 'is-active' : '' }}" title="Archiv">Archiv</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('page.debate') }}" class="{{ request()->routeIs('page.debate') ? 'is-active' : '' }}">Debatten</a>
      </li>
      <li>
        <a href="">Winterthur im Bild</a>
      </li>
    </ul>
    <ul class="is-meta">
      <li><a href="">Über uns</a></li>
      <li><a href="">Mitgliedschaft</a></li>
      <li><a href="">Kontakt</a></li>
      <li><a href="">Newsletter</a></li>
    </ul>
    <ul class="is-social">
      <li>
        <a href="" title="Forum Architektur Winterthur auf Facebook">
          <x-icon type="facebook" />
        </a>
      </li>
      <li>
        <a href="" title="Forum Architektur Winterthur auf Instagram">
          <x-icon type="instagram" />
        </a>
      </li>
    </ul>
  </div>
</nav>





