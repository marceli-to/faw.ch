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
    <p>Forum Architektur Winterthur<br>8400 Winterthur<br><a href="mailto:info@forum-architektur.ch" title="E-Mail">info@forum-architektur.ch</a></p>
    <h2 class="lg:mb-1x">Veranstaltungslokal</h2>
    <p>Forum Architektur Winterthur<br>Zürcherstrasse 43<br>8400 Winterthur<br><x-link-page url="https://goo.gl/maps/6rZKKtMir3xMhzVL9" target="_blank" title="Google Maps" text="Google Maps" cssClass="mt-1x" /></p>
    <h2 class="lg:mb-1x">Social Media</h2>
    <p>
      <x-link-page url="https://www.facebook.com/forumarchitekturwinterthur" target="_blank" title="Forum Architektur Winterthur auf Facebook" text="Facebook" />
      <x-link-page url="http://www.instagram.com/forumarchitekturwinterthur" target="_blank" title="FForum Architektur Winterthur auf Instagram" text="Instagram" cssClass="mt-1x" />
    </p>
    <x-toggle-text title="Impressum" cssClass="mt-6x md:mt-10x mb-10x md:mb-20x" class="mt-20x md:mt-25x lg:mt-30x">
      Inhalt: Forum Architektur Winterthur<br>
      Konzept und Gestaltung: <a href="https://bivgrafik.ch" target="_blank" title="bivgrafik.ch">Bivgrafik GmbH, Zürich</a><br>
      Programmierung: <a href="https://marceli.to" target="_blank" title="marceli.to">Marcel Stadelmann, marceli.to, Zürich</a><br>
      Bilder: Andreas Mader, Winterthur
    </x-toggle-text>
    <x-toggle-text title="Datenschutz" cssClass="mt-6x md:mt-10x text-max-width">
      [Inhalt fehlt]
    </x-toggle-text>
  </div>
</section>
@endsection



 