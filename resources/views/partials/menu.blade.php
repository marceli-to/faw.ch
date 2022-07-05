<nav class="site js-menu">
  <div>
    <ul class="is-main">
      <li>
        <a href="javascript:;" class="js-menu-btn-toggle">Veranstaltungen</a>
        <ul style="display: {{ request()->routeIs('page.event.*') ? 'block' : 'none' }}">
          <li><a href="{{ route('page.event.calendar') }}" class="{{ request()->routeIs('page.event.calendar') ? 'is-active' : '' }}" title="Kalender">Kalender</a></li>
          <li><a href="{{ route('page.event.activities') . '/#jahresprogramm' }}" class="{{ request()->routeIs('page.event.activities') ? 'is-active' : '' }}" title="Jahresprogramm">Jahresprogramm</a></li>
          <li><a href="{{ route('page.event.station') }}" class="{{ request()->routeIs('page.event.station') ? 'is-active' : '' }}" title="Unser Bahnhof Winterthur">Unser Bahnhof Winterthur</a></li>
          <li><a href="{{ route('page.event.workshop') }}" class="{{ request()->routeIs('page.event.workshop') ? 'is-active' : '' }}" title="Stadtwerkstatt">Stadtwerkstatt</a></li>
          <li><a href="{{ route('page.event.archive') }}" class="{{ request()->routeIs('page.event.archive') ? 'is-active' : '' }}" title="Archiv">Archiv</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('page.debate') }}" class="{{ request()->routeIs('page.debate') ? 'is-active' : '' }}" title="Debatten">Debatten</a>
      </li>
      <li>
        <a href="{{ route('page.wib') }}" class="{{ request()->routeIs('page.wib') ? 'is-active' : '' }}" title="Winterthur im Bild">Winterthur im Bild</a>
      </li>
    </ul>
    <ul class="is-meta">
      <li><a href="{{ route('page.about') }}" class="{{ request()->routeIs('page.about') ? 'is-active' : '' }}" title="Über uns">Über uns</a></li>
      <li><a href="{{ route('page.member') }}" class="{{ request()->routeIs('page.member') ? 'is-active' : '' }}" title="Mitgliedschaft">Mitgliedschaft</a></li>
      <li><a href="{{ route('page.contact') }}" class="{{ request()->routeIs('page.contact') ? 'is-active' : '' }}" title="Kontakt">Kontakt</a></li>
      <li>
        <a href="javascript:;" class="js-menu-btn-newsletter">Newsletter</a>
        <div class="my-8x lg:mb-16x" style="display: none">
          <p>Trage deine E-Mail-Adresse in das Eingabefeld und erhalte umgehend eine E-Mail mit einem Bestätigungslink. Klicke auf den Link, um deine E-Mail Adresse zu aktivieren.</p>
          <form method="POST" action="https://72082.seu1.cleverreach.com/f/72082-140653/wcs/" target="_blank">
            <div>
              <input type="email" name="email" placeholder="E-Mail" />
            </div>
            <div class="mt-8x lg:mt-12x">
              <button type="submit" class="btn-submit is-newsletter">
                Anmelden
              </button>
            </div>
          </form>
        </div>
      </li>
    </ul>
    <ul class="is-social">
      <li>
        <a href="https://www.facebook.com/forumarchitekturwinterthur" target="_blank" title="Forum Architektur Winterthur auf Facebook">
          <x-icon type="facebook" />
        </a>
      </li>
      <li>
        <a href="http://www.instagram.com/forumarchitekturwinterthur" target="_blank" title="Forum Architektur Winterthur auf Instagram">
          <x-icon type="instagram" />
        </a>
      </li>
    </ul>
  </div>
</nav>





