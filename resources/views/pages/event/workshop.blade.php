@extends('layout.web')
@section('seo_title', 'Stadtwerkstatt • Veranstaltungen')
@section('seo_description', '')
@section('og_image', url('/') . '/assets/media/faw_stadtwerkstatt-lg.jpg')
@section('content')
<section class="content-visual">
  <div>
    <figure class="visual">
      <picture>
        <source 
          media="(min-width: 1200px)" 
          data-srcset="/assets/media/faw_stadtwerkstatt-lg.jpg">
        <img 
          data-src="/assets/media/faw_stadtwerkstatt-sm.jpg" 
          width="1200" height="800" title="" class="is-responsive lazy">
      </picture>
    </figure>
  </div>
</section>

<?php $lead = '<p>Stell Dir vor, die Bevölkerung wächst, Winterthur wird dichter und keinen kümmert’s! Unvorstellbar, denn in Winterthur beobachtet das Forum Architektur Winterthur aufmerksam die architektonischen und stadträumlichen Veränderungen. Vorausschauend hat das Forum 2018 darum die interdisziplinäre Veranstaltungsreihe «Stadtwerkstätten» organisiert.</p><p>Dieses für die Schweiz einmalige Projekt verknüpft das fachliche Nachdenken über die Stadt der Zukunft mit künstlerischen und partizipativen Mitteln. Und das geht so: Die Künstler Dominik Heim und Ron Temperli haben im Auftrag des Forums ein 8x15 Meter grosses, begehbares Stadtmodell gebaut. Dieses wilde Modell aus Verpackungsmaterial hat 200 interessierte Winterthurerinnen und Winterthurer — die sogenannten Stadtwerkstätter — angeregt, das heutige Winterthur genauer unter die Lupe zu nehmen und Vorstellungen einer lebenswerten, attraktiven Stadt in 20 Jahren zu entwickeln.</p><p>An vier Samstagen wurde intensiv skizziert, geklebt, entworfen, debattiert und festgehalten: Wenn wir verdichten, müssen die Freiräume aufgewertet und die Strassen auch als Freiräume gedacht werden. Beim Verdichten ist eine kluge Vernetzung und Zusammenarbeit aller Akteure gefragt, die Eigenheiten der Quartiere sind wesentlich und das Thema Stadtklima muss präsent sein. Als kritischer Beobachter begleitete der Cartoonist Ruedi Widmer den Prozess, um das Fazit der Debatten und Erkenntnisse in bittersüsse Bilder zu packen.</p><p>Das Forum Architektur Winterthur ist überzeugt, dass die zuständigen Ämter der Stadt die Ideen aus den Stadtwerkstätten mit Interesse in die Testplanung «Räumliche Entwicklungsperspektiven Winterthur 2040» aufnehmen. Denn natürlich müssen sich in erster Linie Politik und Verwaltung um die wachsende Bevölkerung und die dichtere Stadt kümmern.</p>';?>
<section class="content">
  <div>
    <h1>Stadtwerkstatt</h1>
    <h2>Wenn Fachleute, Laien und Kunstschaffende sich um die Stadt der Zukunft kümmern.</h2>
    <article class="lead block md:hide">
      @if (Str::wordCount($lead) > 60)
        <x-truncated-text preview="{!! Str::words($lead, 60, ' ...') !!}">
          {!! $lead !!}
        </x-truncated-text>
      @else
        {!! $lead !!}
      @endif
    </article>
    <article class="lead hide !md:block">
      {!! $lead !!}
    </article>
  </div>
</section>

<section class="content">
  <div>
    @include('pages.event.partials.teaser_sws1')
    @include('pages.event.partials.teaser_sws2')
    @include('pages.event.partials.teaser_sws3')
    @include('pages.event.partials.teaser_sws4')
    @include('pages.event.partials.teaser_sws_impressionen')
  </div>
</section>
<section class="content">
  <div>
    @include('pages.event.partials.teaser_sws_ausstellung')
    @include('pages.event.partials.teaser_sws_stadtmodell')
    @include('pages.event.partials.teaser_sws_illustrationen')
  </div>
</section>
@endsection