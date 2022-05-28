@extends('layout.web')
@section('seo_title', 'Stadtwerkstatt 4 • Veranstaltungen')
@section('og_image', url('/') . '/assets/media/faw_stadtwerkstatt_4-lg.jpg')
@section('seo_description', '')
@section('content')
<section class="content-visual">
  <div>
    <figure class="visual">
      <picture>
        <source 
          media="(min-width: 1200px)" 
          data-srcset="/assets/media/faw_stadtwerkstatt_4-lg.jpg">
        <img 
          data-src="/assets/media/faw_stadtwerkstatt_4-sm.jpg" 
          width="1200" height="800" title="" class="is-responsive lazy">
      </picture>
    </figure>
  </div>
</section>
<section class="content workshop">
  <div>
    <header>
      <h1>Stadtwerkstatt 4</h1>
      <h2>Klima empfinden und vorausschauen</h2>
      <h3>Ergebnisse und Erkenntnisse</h3>
    </header>
    <?php
    $text = '<p>«Die Stadtklimaforschung ist noch nicht angekommen in der Architektur» &mdash; «Rettung durch Technik? Rettung durch Architektur!» &mdash; «Mehr Grün in der Stadt!» &mdash; «Räume, die klimatisch angenehm sind, sind auch sozial gute Räume». Das sind einige der Aussagen, die Jens Andersen (Stadtbaumeister), Astrid Staufer (Architektin und Co-Leiterin Institut für Konstruktives Entwerfen ZHAW), Silke Drautz (Abteilung Stadtklimatologie Stuttgart) und Sascha Roesler (Prof. Accademia d architettura Univerisità della Svizzera italiana) in ihren Inputreferaten und der anschliessenden Diskussion am Donnerstag lieferten. Mit geschärften Sinnen spazierten dann Stadtwerkstätterinnen und &mdash; stätter am heissen Samstagvormittag durch Winterthur, um die klimatischen Aufenthaltsqualitäten zu erkunden. So sieht die Zusammenfassung der Empfindungen und Erkenntnisse der drei Reisegruppen aus:</p>
              <ul class="list mt-10x">
                <li>Verdichtung ist auch unter dem Aspekt des Stadtklimas zu betrachten.</li>
                <li>Frischluftkorridore müssen definiert, gesichert und gepflegt werden.</li>
                <li>Grosse alte Bäume prägen nicht nur einen Ort, sie sind auch prima Klimaanlagen.</li>
                <li>Für jeden neuen Parkplatz gibt’s &mdash; irgendwo in der Stadt &mdash; zwei Bäume, am besten gleich daneben, mit ausreichend durchlässigem Boden und Platz.</li>
                <li>Neue Bäume werden mit Vorteil nicht einzeln sondern in ganzen Korridoren gruppiert.</li>
                <li>Die Winterthurer Stadtplanung und –entwicklung ist zwingend mit dem Faktor Klima zu ergänzen.</li>
                <li>Die Perfektionsspirale der Verwaltung schadet auch dem Stadtklima. Darum braucht es eine Amtsstelle, die übergeordnet verbindet, agiert und optimiert.</li>
                <li>Die BZO ist ein zu schwaches Instrument, um der Stadtklimatologie gerecht zu werden. Gefragt sind Lösungen über die Parzellengrenzen hinweg.</li>
                <li>Der Dialog ist das Instrument der Zukunft.</li>
                <li>Bei den Gebäuden ist der winterliche Schutz vor Kälte ausgereizt, nun braucht des dringend die Beachtung des sommerlichen Schutzes vor Überhitzung. Nicht mit Klimaanlagen, sondern mit selbstverständlichen Elementen wie Beschattung und natürliche Kühlung.</li>
              </ul>';
    ?>
    <article class="lead block md:hide">
      @if (Str::wordCount($text) > 60)
        <x-truncated-text preview="{!! Str::words($text, 60, '...') !!}">
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
      title="Von Bäumen als Klimahelden, Mindestschatten und einem vegetativen Strassenbelag." 
      subtitle="3 Touren."
    />

    <?php
    $text = '<p>Für das Thema «Stadtklima» gäbe es weder eine übergeordnete Gesetzgebung noch eine Verwaltungsstelle, hält Stadtbaumeister Jens Andersen mit Bedauern fest. In Stuttgart ist das anders: Hier wurde schon 1938 eine Abteilung für Stadtklimatologie gegründet, um die klimatischen Verhältnisse in die Stadtplanung zu integrieren. «Bereits damals wurde die Klimahygiene im Städtebau als Mittel zur Förderung und Erhaltung der Gesundheit der Stadtbewohner anerkannt», berichtet die Stuttgarter Stadtklimatologin Silke Drautz. Sie betont die Wichtigkeit von Frischluftkorridoren, Grünräumen und Fassadenbegrünungen. Die blinde Anwendung von Bau- und Energie-normen und Zertifikaten habe letztlich zu einer «Hitzearchitektur» geführt, analysiert die Architektin Astrid Staufer. Sie findet, dass das Thema Klima nicht auf die Technik abgeschoben werden dürfe, sondern in den gestalterischen Elementen der traditionellen Architektur zu suchen sind. Dabei zitiert sie Luigi Snozzis Satz: «Welche Energieverschwendung, welch ein Aufwand, um zu lüften, zu heizen, zu beleuchten, wenn ein Fenster genügt.» In seinem Referat «Die Stadt als thermischer Innenraum der Gesellschaft» hinterfragt Sascha Roesler, SNF-Professor an der der Universität in Mendrisio, das binäre Denken zwischen Innen und Aussen. Diese Trennung sieht er als Folge der Erfindung der Klimaanlage, die weltweit eine homogene Temperatur ermöglicht. </p>';
    ?>
    <article class="text-columns block md:hide">
      @if (Str::wordCount($text) > 60)
        <x-truncated-text preview="{!! Str::words($text, 60, '...') !!}">
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
          title="ROUTE 1: KLINIK SCHLOSSTAL &mdash; ENTLANG DER TÖSS &mdash; NÄGELSEE &mdash; ZÜRCHERSTRASSE" 
        />
        <ul class="list mt-0">
          <li>Der Spaziergang entlang der Töss gefällt: das Mikroklima passt, der Weg ist fast durchgehend, Öffentlichkeit ist möglich.</li>
          <li>Entlang der Töss wundert man sich: warum ist das Leitbild «Erholungsraum Töss» nicht längst umgesetzt?</li>
          <li>Sogar eine Autobahnbrücke hat Vorteile: sie spendet Schatten, schützt vor Lärm und bietet Unterstand.</li>
          <li>Die Terrassensiedlung am Hang ist reizlos: der Grünraum ist ohne parzellenüber-greifenden Anbindung und die baumlose Begrünung leistet ohne Schattenspender keinen Beitrag zur Aufenthaltsqualität.</li>
          <li>Entlang der Zürcherstrasse wählt man instinktiv die Schattenseite und erinnert sich an das vorhandene Entwicklungsleitbild, das auch das Stadtklima verbessern würde.</li>
          <li>Wie wär’s mit einer Mindestschatten-Regel von 4 Stunden, die mit Vordächern, Laubengängen, Gebäudesetzungen, etc. nachzuweisen ist?</li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="ROUTE 2: BAHNHOF SEEN &mdash; GRÜZEFELD &mdash; GEISELWEID" 
        />
        <ul class="list mt-0">
          <li>Die weitläufigen Asphaltflächen sind für die Autos und nicht für die Menschen gemacht. Sogar grüne Resträume fehlen hier.</li>
          <li>Lassen sich die versiegelten Flächen streifenweise aufbrechen und durch einen vegetativen Belag ersetzen? Zumindest auf den Trottoirs! </li>
          <li>Für die grossen Hitzegebiete sollten «Rettungsinseln» geschaffen werden, welche Aufenthaltsqualitäten haben und dadurch auch zu sozialen Räumen werden.</li>
          <li>Angesichts der glatten Fassaden denkt man an die Vorteile der traditionellen Architektur mit anständigen, schattenspendenden Vor- und Rücksprüngen.</li>
          <li>Für jeden neuen Parkplatz gibt’s &mdash; irgendwo in der Stadt &mdash; zwei Bäume, am besten gleich daneben und mit ausreichend durchlässigem Boden und Platz.</li>
          <li>Das grosse Grüzefeld hat das Zeug zum Park. Wieso ist der schlafende Riese noch nicht geweckt worden?</li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="ROUTE 3: KANTONSSCHULE LEE &mdash; INNERES LIND &mdash; TEUCHEL WEIHER &mdash; SULZERREAL" 
        />
        <ul class="list mt-0">
          <li>Quartiere mit kleinteiligen Strukturen und viel Grün sind wichtige Freiluftkorridore. Diesen gilt es Sorge zu tragen <li>erst recht beim Verdichten!</li>
          <li>Alte Bäume sind Klimahelden: sie ersetzen fünf Klimaanlagen und ihre Baumkronen von 4 000 Kubikmetern entsprechen 100 neugepflanzten Bäumen.</li>
          <li>Das Privatrecht mit den Baumabständen zu den Parzellengrenzen erschwert heute das Pflanzen von grossen Bäumen.</li>
          <li>Tiefgaragen, die von Parzellengrenze zu Parzellengrenze reichen, sind sichtbar: auf ihnen wachsen keine mächtigen Bäume.</li>
          <li>Der Obere Graben beweist: wo das Klima stimmt, fühlen sich die Menschen wohl.</li>
          <li>Beim Roten Turm fliehen alle an die Schattenorte. Wegen der mangelnden Überdeckung bleibt der fast nackte Hof auf den Tiefgaragen leer. </li>
        </ul>
      </article>
    </div>
    <div class="grid grid-cols-12">
      <article class="teaser no-line">
        <div>
          <a href="/assets/media/downloads/faw_dokumentation_stadtwerkstatt_4.pdf" class="anchor anchor--file " target="_blank" title="Download Dokumentation Stadtwerkstatt 4">
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
        <h3>Spaziergang Schlosstal – Tössfeld</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/Gt1f1VbuYlc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Grüze – Neuhegi</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/UfBDEOX0rc8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Rychenberg – Sulzerareal</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/eDnbReqFgrs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
    </div>
  </div>
</section>
@endsection