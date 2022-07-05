@extends('layout.web')
@section('seo_title', 'Stadtwerkstatt 1 • Veranstaltungen')
@section('og_image', url('/') . '/assets/media/faw_stadtwerkstatt_1-lg.jpg')
@section('seo_description', '')
@section('content')
<section class="content-visual">
  <div>
    <figure class="visual">
      <picture>
        <source 
          media="(min-width: 1200px)" 
          data-srcset="/assets/media/faw_stadtwerkstatt_1-lg.jpg">
        <img 
          data-src="/assets/media/faw_stadtwerkstatt_1-sm.jpg" 
          width="1200" height="800" title="" class="is-responsive lazy">
      </picture>
    </figure>
  </div>
</section>
<section class="content workshop">
  <div>
    <header>
      <h1>Stadtwerkstatt 1</h1>
      <h2>Stadt finden und entwickeln</h2>
      <h3>Ergebnisse und Erkenntnisse</h3>
    </header>
    <?php
    $text = '<p>Die Diskussion mit Brigit Wehrli (Stadtsoziologin), Ute Schneider (Architektin/Stadtplanerin), Regula Iseli (ZHAW) und Jens Andersen (Stadtbaumeister) hat rund 100 Gäste an die erste Stadtwerkstatt gelockt. Über 30 Interessierte begaben sich am darauffolgenden Samstag durch Winterthur spazierend auf eine räumliche Spurensuche und fassten ihre Beobachtungen in Form von Skizzen, Plänen und Modellen zusammen. Eine wichtige Gedankenstütze bildete dabei das gigantische Stadtmodell der Künstler Dominik Heim und Rom Temperli.</p><ul class="list mt-10x">
  <li>Die Idee der bipolaren Stadt ist unzutreffend. Es gibt in Winterthur vielleicht zwei Hauptzentren — die Altstadt und das heranwachsende Neuhegi —, sicher aber viele Subzentren/Quartiere.</li>
  <li>Die Quartiere respektive die Dorfkerne haben Charakter und spezifische Eigenschaften.</li>
  <li>Die Quartiere — mit Kern, Wohngebieten und der Verzahnung mit der Landschaft — sind das Rückgrat der Stadt. Dieses  Rückgrat gilt es zu stärken und deren Ränder bewusst zu behandeln.</li>
  <li>Die Durchlässigkeit in den Quartieren wird durch Kleinstparzellierungen behindert. Ein Nachdenken über Grenzen und ihre Überwindung ist gefragt.</li>
  <li>Wie grüne Fjorde dringt die Landschaft zum Teil weit in die Quartiere. Diese Fjorde haben eine besondere Aufmerksamkeit verdient.</li>
  <li>Stärkende Eingriffe können klein und präzis sein, gerne mit grosser Wirkung. Auf jeden Fall sollen Eingriffe flexible Entwicklungen zulassen.</li>
  <li>Bahnhöfe wären raumprägende Katalysatoren. Oft fristen sie in Winterthur ein Mauerblümchendasein. Dabei hätten sie enormes Potenzial.</li>
  <li>Auch im Gleiskorridor schlummert eine aussergewöhnliche Reserve für einen einmaligen räumlichen Entwicklungsschub.</li>
  <li>Die Autobahn ist in der Stadt zwar nicht direkt sichtbar, aber trotzdem omnipräsent und raumbestimmend. Das wird vor allem an den Rändern und Einfallstoren spürbar.</li>
  <li>Winterthur hat drei Flüsse! Hier wartet ein Potenzial darauf, endlich entdeckt zu werden.</li>
</ul>';
    ?>
    <article class="lead block md:hide">
      @if (Str::wordCount($text) > 60)
        <x-truncated-text preview="{!! Str::words($text, 60, ' ...') !!}">
          {!! $text !!}
        </x-truncated-text>
      @else
        {!! $text !!}
      @endif
    </article>
    <article class="lead hide !md:block">
      {!! $text !!}
    </article>
  </div>
</section>
<section class="content workshop">
  <div>
    <x-heading 
      type="h2" 
      title="Einsame Bahnhöfe. Eine trennende Autobahn, grüne Fjorde" 
      subtitle="Sechs Spaziergänge durch Winterthur"
    />

    <?php
    $text = '<p>«Erhalten, entrümpeln, verdichten» diesen Weg zeigt die Stadtsoziologin Brigit Wehrli in ihrem Referat auf. Wachstum und Verdichtung seien möglich, wobei sie auch an die Grenzen der Verdichtung erinnert und für eine urbane Resilienz plädiert. Ihre Empfehlungen: 1. Qualität erhalten und neue schaffen. 2. Dorfkerne sanft weiterentwickeln. 3. Die Idee der Gartenstadt weiterführen. 4. Die Industrievergangenheit nutzen. 5. Massnahmen für soziale und demografische Durchmischung ins Auge fassen. 6. Den Bildungsstandort pflegen. 7. Partizipation.</p><p>«Den Bestand erhalten und ihn gleichzeitig mit neuen, attraktiven Themen überschreiben» — so bringt es die Stadtplanerin und Architektin Ute Schneider zu Beginn ihres Referats auf den Punkt. Sie erinnert daran, dass Stadtentwicklung immer ein Verhandlungsprozess sei. Ihre Empfehlungen: 1. Entwicklungen mit attraktiven Setzungen und Fakten vorantreiben. 2. Planungen brauchen immer auch einen flexiblen Rahmen für Unvorhergesehenes. 3. Gebäude unterschiedlichen Alters sind das Sinnbild einer vitalen Stadt und zeigen, dass auch eine Stadt ständig in Bewegung ist. 4. Nutzungsmischung ist das A und O einer lebendigen Stadt.</p><p>Wo erkennen Sie auf Ihrem Spaziergang, dass Sie in Winterthur sind? Woran erkennen Sie, dass sich Winterthur zum Guten entwickelt hat respektive, dass Chancen verpasst wurden? Ausgerüstet mit diesen drei Fra-gen begeben sich Stadtwerkstätterinnen und Stadtwerkstätter auf sechs Spaziergänge durch periphere Quartiere der Stadt. Die räumlichen Erkundungstouren werden dann am 8×15 Meter grossen Stadtmodell der Künstler Dominik Heim und Ron Temperli überprüft. Die beiden haben ein begehbares Stadtmodell aus allerlei Abfallmaterial gebaut. Zwei Stunden, viele Fotografien, altes Verpackungsmaterial und eine Werkzeugkiste mit Scheren und Leim stehen den Stadtwerkstatt-Gruppen zur Verfügung, ihre Spaziergänge in Reiseberichte zu verwandeln. Entdeckte räumliche Situationen und Besonderheiten, Beobachtungen und Erkenntnisse sind gefragt, die in kurzen Präsentationen präzis und anschaulich allen erläutert und schliesslich zu einem Fazit eingedampft werden.</p>';
    ?>
    <article class="text-columns block md:hide">
      @if (Str::wordCount($text) > 60)
        <x-truncated-text preview="{!! Str::words($text, 60, ' ...') !!}">
          {!! $text !!}
        </x-truncated-text>
      @else
        {!! $text !!}
      @endif
    </article>
    <article class="text-columns hide !md:block">
      {!! $text !!}
    </article>
  </div>
</section>
<section class="content workshop">
  <div>
    <div class="grid grid-cols-12">

      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 1: Dättnau" 
        />
        <ul class="list mt-0">
          <li>Das bis 1798 gültige Bauverbot ist noch spürbar: Es gibt keinen Dorfkern.</li>
          <li>Die Entwicklung war rasant: rund die Hälfte der überbauten Fläche ist im Verlauf der letzten 10 Jahre entstanden.</li>
          <li>Hier wird offenbar nur gewohnt: 3’000 Einwohner haben keine Beiz und keinen Laden. Baumarkt und Schwimmbad sind immerhin in der Nähe. Das Projekt Ziegelei mit (Alters-)Wohnungen und einer Migros-Filiale ist die Chance.</li>
          <li>Eine Hochspannungsleitung «durchschneidet» das Quartier und ist Merkmal.</li>
          <li>Die Autobahn ist eine räumliche und funktionale Zäsur, könnte jedoch auch Potenzial für einen Highway darüber sein und Dättnau mit dem Industriegebiet, als Eingangstor der Stadt, verbinden.</li>
        </ul>
      </article>

      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 2: Wülflingen" 
        />
        <ul class="list mt-0">
          <li>Wülflingen hat zwei Zentren: den alten Dorfkern mit Restaurant, Geschäften, Gewerbe und Wohnen und den Bahnhof, um den sich ein neues Zentrum entwickelt.</li>
          <li>Der Lindenplatz als wichtiges Zentrum ist mehr Kreuzung als Platz.</li>
          <li>Es gibt Siedlungen mit grosszügigen, leider unvernetzten Freiräumen.</li>
          <li>Die Autobahn zerschneidet und prägt.</li>
          <li>In den Neubauquartieren gibt es nur Wohnen, Wohnen, Wohnen.</li>
        </ul>
      </article>

      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 3: Rosenberg" 
        />
        <ul class="list mt-0">
          <li>Die Autobahn ist die Stadtgrenze und bildet das Eingangstor aus dem Weinland.</li>
          <li>Familiengärten und das Einkaufszentrum bilden den Auftakt zur Stadt.</li>
          <li>Der Schützenweiher ist Erholungsgebiet und stiftet Identität.</li>
          <li>Das stark parzellierte EFH-Quartier wirkt starr und sozial homogen. Hier ist der Wunsch nach individueller Verdichtung allenthalben sichtbar. Die Strassen und Plätze funktionieren für die Bewohnerinnen und Bewohner als Begegnungsraum.</li>
          <li>Entlang der Schaffhauserstrasse und um das Zentrum Rosenberg scheint es ein grosses Verdichtungspotenzial zu geben.</li>
        </ul>
      </article>
      
      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 4: Hegi" 
        />
        <ul class="list mt-0">
          <li>Hegi hat einen Bahnhof ohne Dorf.</li>
          <li>Grenzen sind in Hegi ein wichtiges Thema. Zu Elsau hin sind keine mehr erkennbar.</li>
          <li>Homogene Wohnsiedlungen — wie die Siedlung «Gern» — könnten überall stehen.</li>
          <li>Im alten Dorfkern freut man sich über die Dichte, ist dann aber enttäuscht, weil alles menschleer und entseelt wirkt. Ist der schöne Dorfkern nur Kulisse?</li>
          <li>Aufatmen im neuen Eulachpark: Wohl-tuend grosszügig und offen. Hier ist endlich Wasser spür- und hörbar! Die offene Eulach belebt.</li>
        </ul>
      </article>
      
      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 5: Zinzikon" 
        />
        <ul class="list mt-0">
          <li>Die einreihige Birkenallee fällt auf.</li>
          <li>Viele Grünräume wirken wie grüne Fjorde. Ein besseres Nutzen der topografisch möglichen Blickbezüge auf die Siedlungsstrukturen wäre verheissungsvoll.</li>
          <li>Ungleichgewichte fallen auf: kleine Strassen treffen auf grosse Siedlungen oder breite Strassenräume sind mit  kleinen Siedlungsbauten gesäumt.</li>
          <li>Die Kernzonen wirken oft sinnentleert, die Fassaden der Bauernhäuser sind teilweise nur noch «Abziehbilder». Eine andere Nutzung als Wohnen würde den Kern beleben.</li>
          <li>Es fehlt eine ÖV-Feinerschliessung, um das Potenzial des Bahnhofs auszunutzen.</li>
        </ul>
      </article>
      
      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 6: Oberseen" 
        />
        <ul class="list mt-0">
          <li>Im Einfamilienhaus-Quartier am Sonnenhang mit Aussicht herrscht Wildwuchs trotz Monokultur. Hier gilt oft: Seen, um nicht gesehen zu werden.</li>
          <li>Gemeinschaft scheint zweitranging zu sein. Genossenschaftsbauten fehlen.</li>
          <li>Mit der S-Bahn ist man rasch und direkt, an der Altstadt vorbei, mit Zürich verbunden.</li>
          <li>Teilweise wirkt das Quartier dicht, ohne es wirklich zu sein.</li>
          <li>Die Durchgängikeit des Wegnetzes ist ein Problem: Die Erscheinung der Strassen lassen Verbindungsachsen erwarten, in Wirklichkeit sind es aber Sackgassen.</li>
          <li>Es fehlt ein spürbarer Ankerpunkt, ein verbindendes Rückgrat. Könnte eine Panoramaterrasse Verbindung und Gemeinschaft fördern?</li>
        </ul>
      </article>
    </div>
    <div class="grid grid-cols-12">
      <article class="teaser no-line">
        <div>
          <a href="/assets/media/downloads/faw_dokumentation_stadtwerkstatt_1.pdf" class="anchor anchor--file " target="_blank" title="Download Dokumentation Stadtwerkstatt 1">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16"><path fill="currentColor" d="M6.1 0H0v16.2h12V5.7L6.1 0zM6 1.3l4.7 4.4H6V1.3zM1 15.2V1h4.1v5.7h6.1v8.5H1z"></path></svg>
            <span>Dokumentation</span>
          </a>
        </div>
      </article>
    </div>
  </div>
</section>
<section class="content workshop">
  <div>
    <div class="grid grid-cols-12">
      <article class="video">
        <h3>Spaziergang Dättnau</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/LvrrWxaTLT8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Wülflingen</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/fJLE31CAgtM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Rosenberg</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/qzWxQfY0GeA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Neu-Hegi</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/2pOczxFvhWA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Zinzikon</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/omIr43MJlc8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Oberseen</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/PmGHpj3-17c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
    </div>
  </div>
</section>
@endsection