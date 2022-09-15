@extends('layout.web')
@section('seo_title', 'Kontakt')
@section('seo_description', '')
@section('og_image', url('/') . '/assets/media/faw_kontakt-lg.jpg')
@section('content')
<section class="content-visual">
  <div>
    <figure class="visual">
      <picture>
        <source 
          media="(min-width: 1200px)" 
          data-srcset="/assets/media/faw_kontakt-lg.jpg">
        <img 
          data-src="/assets/media/faw_kontakt-sm.jpg" 
          width="1200" height="800" title="" class="is-responsive lazy">
      </picture>
    </figure>
  </div>
</section>
<section class="content">
  <div>
    <h1>Kontakt</h1>
    <h2 class="lg:mb-1x">Kontaktadresse</h2>
    <p>Forum Architektur Winterthur<br>8400 Winterthur<br><a href="mailto:info@forum-architektur.ch" class="link" title="E-Mail">info@forum-architektur.ch</a></p>
    <h2 class="lg:mb-1x">Veranstaltungslokal</h2>
    <p>Forum Architektur Winterthur<br>Zürcherstrasse 43<br>8400 Winterthur<br><x-link-page url="https://goo.gl/maps/6rZKKtMir3xMhzVL9" target="_blank" title="Google Maps" text="Google Maps" cssClass="mt-1x" /></p>
    <h2 class="lg:mb-1x">Social Media</h2>
    <p>
      <x-link-page url="https://www.facebook.com/forumarchitekturwinterthur" target="_blank" title="Forum Architektur Winterthur auf Facebook" text="Facebook" />
      <x-link-page url="http://www.instagram.com/forumarchitekturwinterthur" target="_blank" title="FForum Architektur Winterthur auf Instagram" text="Instagram" cssClass="mt-1x" />
    </p>
    <x-toggle-text title="Impressum" cssClass="mt-6x md:mt-10x mb-10x md:mb-20x" class="mt-20x md:mt-25x lg:mt-30x">
      Redaktion und Text: Forum Architektur Winterthur<br>
      Bilder: <a href="https://andreasmader.ch" target="_blank" title="andreasmader.ch" class="link">Andreas Mader</a>, Winterthur; Andreas Wolfensberger, Winterthur<br>
      Konzept und Gestaltung: <a href="https://bivgrafik.ch" target="_blank" title="bivgrafik.ch" class="link">Bivgrafik – Visuelle Gestaltung, Zürich</a><br>
      Programmierung: <a href="https://marceli.to" target="_blank" title="marceli.to" class="link">Marcel Stadelmann, marceli.to, Zürich</a><br>
      &copy; {{date('Y', time())}}
    </x-toggle-text>
    <x-toggle-text title="Datenschutz" cssClass="mt-6x md:mt-10x text-max-width">
      <h2>DATENSCHUTZERKLÄRUNG</h2>
      <p>Die Betreiber dieser Seiten nehmen den Schutz Ihrer persönlichen Daten sehr ernst. Wir behandeln Ihre personenbezogenen Daten vertraulich und entsprechend der gesetzlichen Datenschutzvorschriften sowie dieser Datenschutzerklärung.</p>
      <p>Die Nutzung unserer Website ist in der Regel ohne Angabe personenbezogener Daten möglich. Soweit auf unseren Seiten personenbezogene Daten (beispielsweise Name, Anschrift oder E-Mail-Adressen) erhoben werden, erfolgt dies, soweit möglich, stets auf freiwilliger Basis. Diese Daten werden gemäss dieser Datenschutzerklärung teilweise an Dritte weitergegeben.</p>
      <p>Wir weisen darauf hin, dass die Datenübertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitslücken aufweisen kann. Ein lückenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht möglich.</p>
      <h3>Cookies</h3>
      <p>Die Internetseiten verwenden teilweise so genannte Cookies. Cookies richten auf Ihrem Rechner keinen Schaden an und enthalten keine Viren. Cookies dienen dazu, unser Angebot nutzerfreundlicher, effektiver und sicherer zu machen. Cookies sind kleine Textdateien, die auf Ihrem Rechner abgelegt werden und die Ihr Browser speichert.</p>
      <p>Die meisten der von uns verwendeten Cookies sind so genannte „Session-Cookies“. Sie werden nach Ende Ihres Besuchs automatisch gelöscht. Andere Cookies bleiben auf Ihrem Endgerät gespeichert, bis Sie diese löschen. Diese Cookies ermöglichen es uns, Ihren Browser beim nächsten Besuch wiederzuerkennen.</p>
      <p>Sie können Ihren Browser so einstellen, dass Sie über das Setzen von Cookies informiert werden und Cookies nur im Einzelfall erlauben, die Annahme von Cookies für bestimmte Fälle oder generell ausschließen sowie das automatische Löschen der Cookies beim Schließen des Browser aktivieren. Bei der Deaktivierung von Cookies kann die Funktionalität dieser Website eingeschränkt sein.
      <h3>Hosting Provider & Server-LogFiles</h3>
      <p>Der Provider der Seiten erhebt und speichert automatisch Informationen in so genannten Server-Log Files, die Ihr Browser automatisch an uns übermittelt. Dies sind:</p>
      <p>IP-Adresse, Browsertyp und Browserversion, verwendetes Betriebssystem, Referrer URL, Hostname des zugreifenden Rechners und die Uhrzeit der Serveranfrage</p>
      <p>Diese Daten können nicht direkt bestimmten Personen zugeordnet werden. Eine Zusammenführung dieser Daten mit anderen Datenquellen wird nicht vorgenommen. Wir behalten uns vor, diese Daten nachträglich zu prüfen, wenn uns konkrete Anhaltspunkte für eine rechtswidrige Nutzung bekannt werden.</p>
      <p>Diese Daten sowie alle Daten dieser Website werden bei unserem Hosting-Provider Escapenet.ch GmbH, 8400 Winterthur, Schweiz gespeichert.</p>
      <h3>Recht auf Auskunft, Löschung, Sperrung</h3>
      <p>Sie haben jederzeit das Recht auf unentgeltliche Auskunft über Ihre gespeicherten personenbezogenen Daten, deren Herkunft und Empfänger und den Zweck der Datenverarbeitung sowie ein Recht auf Berichtigung, Sperrung oder Löschung dieser Daten. Hierzu sowie zu weiteren Fragen zum Thema personenbezogene Daten können Sie sich jederzeit unter der im Impressum angegebenen Adresse an uns wenden.</p>
    </x-toggle-text>
  </div>
</section>
@endsection



 