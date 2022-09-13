@extends('layout.web')
@section('seo_title', 'Stadtwerkstatt 3 • Veranstaltungen')
@section('og_image', url('/') . '/assets/media/faw_stadtwerkstatt_3-lg.jpg')
@section('seo_description', '')
@section('content')
<section class="content-visual">
  <div>
    <figure class="visual">
      <picture>
        <source 
          media="(min-width: 1200px)" 
          data-srcset="/assets/media/faw_stadtwerkstatt_3-lg.jpg">
        <img 
          data-src="/assets/media/faw_stadtwerkstatt_3-sm.jpg" 
          width="1200" height="800" title="" class="is-responsive lazy">
      </picture>
    </figure>
  </div>
</section>
<section class="content workshop">
  <div>
    <header>
      <h1>Stadtwerkstatt 3</h1>
      <h2>Wege begehen und weiterkommen</h2>
      <h3>Ergebnisse und Erkenntnisse</h3>
    </header>
    <?php
    $text = '<p>«Eine lebensfreundliche Stadt braucht viel Mobilität» &mdash; «Du sollst für lebendige Stadträume sorgen!» &mdash; «Der motorisierte Individualverkehr muss als Teil des öffentlichen Verkehrs gedacht werden, erst recht, wenn die Autos in Zukunft selbstfahrend sind.» &mdash; «Die Digitalisierung gibt den Verkehrsplanern neue Instrumente in die Hand.» Die Aussagen in der hitzigen Diskussion mit Thomas Sauter-Servaes (Leiter Studiengang Verkehrssysteme ZHAW), Fritz Kobi (Verkehrsexperte), Andreas Sonderegger (Mitglied Gruppe Krokodil/IKE ZHAW) und Mark Würth (Amt für Stadtentwicklung Stadt Winterthur) waren vielfältig. Ausgerüstet mit diesen Behauptungen zogen am Samstag 45 Stadtwerkstätterinnen und -werkstätter zu Fuss, auf dem Velo, im Spezial-Ringbus und mit den öffentlichen Verkehrsmitteln los, den Strassenraum in Winterthur zu erkunden. Die Beobachtungen der sechs Reisegruppen wurden zu folgenden Erkenntnissen zusammengefasst:</p>
              <ul class="list mt-10x">
                <li>Es braucht den politischen Willen und Mut, verkehrspolitische Grundsätze zu formulieren.</li>
                <li>Wer an Strassenflächen denkt, muss immer vom Menschen ausgehen — nicht von den Autos.</li>
                <li>Tempo 30 verursacht weniger Lärm, macht den Verkehr auf den Strassen erträglicher und braucht weniger Platz. Darum: subito ein flächendeckendes Tempo 30 einführen, besonders auf den Einfallsachsen.</li>
                <li>Die Stadthausstrasse könnte längst verkehrsbefreit sein. Dasselbe wäre an der Technikumstrasse mutig zu prüfen.</li>
                <li>Der Hauptbahnhof ist wegen des zentralistisch organisierten öVs ein Nadelöhr und braucht dringend eine Entlastung und ein klares räumliches Konzept.</li>
                <li>Eine Stadt- oder Ringbahn könnte die Situation am Hauptbahnhof entspannen. Die peripheren Bahnhöfe sind die neuen Umsteige-Hubs für Pendler.</li>
                <li>Am Schluss bleibt die Frage: Hat Winterthur eigentlich nicht genug Infrastruktur, die darauf wartet, besser und klüger vernetzt zu werden?</li>
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
      title="Tempo 30 aber Subito! Und freie Fahrt für die Stadtbahn." 
      subtitle="Sechs Touren."
    />

    <?php
    $text = '<p>Die digitale Revolution habe in Zukunft einen enormen Einfluss auf unsere Mobilität. Davon ist Thomas Sauter-Servaes überzeugt. Der Mobilitätsforscher und Leiter der Studiengangs Verkehrssysteme ZHAW weist an der Stadtwerkstatt 3 darauf hin, dass Autos heute bezüglich Energie, Nutzung und Fahrtzeit alles andere als effizient seien. Die Digitalisierung könne das ändern: Dank Smartphone liesse sich der motorisierte Individualverkehr bestens organisieren und zwar so, dass das Auto auch zum öffentlichen Verkehrsmittel wird. In absehbarer Zeit seien selbstfahrende Autos unterwegs, die allerdings nicht mehr dem Bild heutiger Autos entsprechen. Weil die Mobilität damit billiger werde, warnt Sauter-Servaes vor dem Rebound-Effekt.</p>
             <p>«Eine lebensfreundliche Stadt braucht viel Mobilität», sagt Fritz Kobi. Der erfahrene Verkehrsexperte zeigt, wie er das mit dem sogenannten «Berner Modell» in Köniz durchgespielt hat. Attraktive Wege für Fussgänger und Velofahrerinnen und ein öV, der Priorität hat, sind die Schlüsselbegriffe. Dazu braucht es einen politischen Willen, ein neues Rollenverständnis der Planer, einen partizipativen Planungsprozess und eine Kultur der Zusammenarbeit.</p>';
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
          title="TOUR 1: MIT DEM RINGBUS 22 VON TÖSS ÜBER DEN LINDENBERG NACH TÖSS" 
        />
        <ul class="list mt-0">
          <li>Der Ringbus ist zwar eine kecke Idee, aber kaum alltagstauglich, denn die Linienführung ist zu wenig direkt.</li>
          <li>Sinnvoller als ein Ringbus wäre eine Spangenlösung: Eine bessere Anbindung der bestehenden Bahnhöfe ist gefragt.</li>
          <li>Das Ringbus-Experiment bringt uns auf den Gedanken: Eine neue Linie Goldenberg-Eschenberg kann zwei touristische Highlights erschliessen.</li>
          <li>Viel gute Infrastruktur ist vorhanden. Verbessern wir das Bestehende!</li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="TOUR 2: MIT DEM RINGBUS 22 VON ODERWINTERTHUR ÜBER TÖSS NACH OBERWINTERTHUR" 
        />
        <ul class="list mt-0">
          <li>Ein Ringbus bringt im Alltag nichts.</li>
          <li>Die Gestaltung des Strassenraumes ist unbemüht. Mehr Zusammenarbeit der Ämter und der Einbezug von vorhandenen Konzepten sind bitter nötig.</li>
          <li>«Schöne Strassen» &mdash; mit Langsamverkehr, attraktiven Aufenthaltsqualitäten und einem angenehmen Klima &mdash; sind Idealvorstellungen, die umgesetzt werden sollen.</li>
          <li>Auch die Stadtbusse stecken im Stau. Darum: Schaffen wir die Stadtbusse ab und ersetzen sie durch eine Stadtbahn als primäre Erschliessung.</li>
          <li>Als Ergänzung zur Stadtbahn gibt’s den «Ubershuttel», der die Feinverteilung in den Quartieren gewährleistet. </li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="TOUR 3: MIT DEM VELO VON TÖSS ÜBER WÜLFLINGEN INS FORUM ARCHITEKTUR" 
        />
        <ul class="list mt-0">
          <li>Der Ausweichverkehr in den Quartieren ist zu Pendlerzeiten deutlich zu spüren.</li>
          <li>Die Spange Jägerstrasse/Tössfeldstrasse ist ein Problem. Schnellfahrende Autos bedrängen den Langsamverkehr. Tempo 30 tut Not.</li>
          <li>Generell Tempo 30 &mdash; auch auf den Einfallsachsen &mdash; bietet den Bussen und den Velos mehr Platz und vermindert den Lärm.</li>
          <li>Warum sind die Privatgrundstücke entlang der Strassen oft so billig bepflanzt?</li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="TOUR 4: MIT DEM VELO VOM STADTHAUS ÜBER DEN EULACHPARK INS FORUM ARCHITEKTUR" 
        />
        <ul class="list mt-0">
          <li>Der Mischverkehr in der Altstadt ist angenehm. Hier geben die Fussgängerinnen und Fussgänger das Tempo vor, hier regelt die Vernunft den Verkehr.</li> 
          <li>Die Hauptrouten sind für Velos grundsätzlich in Ordnung. Allerdings sind Querungen schwierig. Hier braucht es dringend Lösungen!</li>
          <li>Mehr Veloparkplätze sind mittelfristig nötig.</li>
          <li>Auf Veloschnellrouten sind getrennte Wege erstrebenswert: Für den Langsamverkehr (10–20 km/h) und die E-Bikes (20–45 km/h) </li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="TOUR 5: ZU FUSS UM DIE ALTSTADT TECHNIKUMSTRASSE &mdash; STADTHAUSSTRASSE &mdash; BAHNHOF" 
        />
        <ul class="list mt-0">
          <li>Ist die Altstadt eine Insel oder eine Enklave?</li>
          <li>Die verkehrsbefreite Stadthausstrasse ist schon fast Realität. Es fehlt nur die Beschilderung.</li>
          <li>Was auf der Stadthausstrasse möglich ist, sollte auch für die Technikumstrasse geprüft werden. Die Arkaden haben hier Potenzial!</li>
          <li>Statt Wildkorridore braucht es in der Stadt Menschenkorridore: Die Altstadt muss spürbar mit den umgebenden Quartieren vernetzt werden.</li>
          <li>Fussgängerstreifen und Lichtsignale sind passé: Auf der vernetzten Allmend gibt es keine Priorisierung eines Verkehrsteilnehmers.</li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="TOUR 6: MIT DEM öV RUND UM WINTERTHUR" 
        />
        <ul class="list mt-0">
          <li>Der öffentliche Verkehr ist robust: Trotz Verzögerungen durch Bauarbeiten und Betriebsstörungen ist die Verspätung am Schluss minim.</li>
          <li>Dem Hauptbahnhof droht ein Kollaps: Durch die Anbindung der Neubauquartiere Neu-Hegi und Oberwinterthur an die S-Bahn verschärft sich der Engpass am Hauptbahnhof.</li>
          <li>Die WinoWest-Bahn bringt Luft: Eine Stadtbahn entlang der Autobahn schleust die Pendlerinnen und Pendler direkt nach Zürich oder St. Gallen und nicht mehr über den Hauptbahnhof.</li>
        </ul>
      </article>
    </div>
    <div class="grid grid-cols-12">
      <article class="teaser no-line">
        <div>
          <a href="/assets/media/downloads/faw_dokumentation_stadtwerkstatt_3.pdf" class="anchor anchor--file " target="_blank" title="Download Dokumentation Stadtwerkstatt 3">
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
        <h3>Tour Ringbus A</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/knXWmSlxt60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Tour Ringbus B</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/xbbnZvWghsM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Tour Velo ab Töss</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/IVt8IRyD9H0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Tour Velo ab Stadthaus</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/A8gY3xssniA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Altstadt</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/M2bXyjRVBZE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>

      <article class="video">
        <h3>Tour Öffentlicher Verkehr</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/Z-IfX2ZH7_k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
    </div>
  </div>
</section>
@endsection