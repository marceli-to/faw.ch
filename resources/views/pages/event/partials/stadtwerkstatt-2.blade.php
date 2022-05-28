@extends('layout.web')
@section('seo_title', 'Stadtwerkstatt 2 • Veranstaltungen')
@section('og_image', url('/') . '/assets/media/faw_stadtwerkstatt_2-lg.jpg')
@section('seo_description', '')
@section('content')
<section class="content-visual">
  <div>
    <figure class="visual">
      <picture>
        <source 
          media="(min-width: 1200px)" 
          data-srcset="/assets/media/faw_stadtwerkstatt_2-lg.jpg">
        <img 
          data-src="/assets/media/faw_stadtwerkstatt_2-sm.jpg" 
          width="1200" height="800" title="" class="is-responsive lazy">
      </picture>
    </figure>
  </div>
</section>
<section class="content workshop">
  <div>
    <header>
      <h1>Stadtwerkstatt 2</h1>
      <h2>Freiraum erleben und nutzen</h2>
      <h3>Ergebnisse und Erkenntnisse</h3>
    </header>
    <?php
    $text = '<p>«Wer hat Angst vor dem öffentlichen Raum?» — «Privatisierung und Eventisierung verwandeln öffentliche Räume in «Fake-Open-Spaces!» — «Freiraum ist Stadtraum!» — «Warum setzen wir vielen bestehenden Freiraum-Konzepte in Winterthur nicht endlich um?». Das waren einige Fragen und Aussagen, die in der Diskussion mit Günther Vogt (Landschaftsarchitekt), Christian Schmid (Soziologe), Stefan Kurath (Urbanist) und Jens Andersen (Stadtbaumeister) in der Stadtwerkstatt 2 aufs Tapet kamen. Der Aufmarsch des Publikums war gross. Auch am darauffolgenden Samstag kamen viele: über 60 Stadtwerkstätterinnen und Stadtwerkstätter spazierten durch Winterthur, begutachteten Freiräume und fassten ihre Beobachtungen in Form von Skizzen, Plänen und Modellen zusammen. Das wimmelbuchartige Stadtmodell der Künstler Dominik Heim und Ron Temperli war für alle wiederum eine Inspirationsquelle.</p>
              <ul class="list mt-10x">
                <li>Es gibt in Winterthur viele tolle Freiräume. Diese Freiräume sind wie Schätze, die mit einer Schatzkarte sichtbar gemacht werden sollten.</li>
                <li>Die Freiräume und der öffentliche Raum stehen unter vielfältigem Druck. Damit sie nicht verkümmern, haben sie einen «Kümmerer» nötig, nämlich eine starke Verwaltung.</li> 
                <li>Das Thema Wasser müsste Leitthema werden. Töss, Eulach und Mattenbach warten auf einen kreativen Umgang und Zugang, damit möglichst viel Freiraum am Wasser gesichert wird.</li>
                <li>Grüne Fjorde mit bewaldeten Hügeln und freien Feldern ragen in die Stadt. In Kombination mit den Flüssen könnte ein fantastisches Freiraumnetz entstehen.</li>
                <li>Auch der Gleisraum bietet das Potenzial für einen stadtverbindenden Freiraum.</li>
                <li>Ein einzelner Freiraum muss nicht alles können und allen Bedürfnissen gerecht werden. Er ist Teil eines Stadtpuzzles. Wichtig sind die Verbindungen und die Nutzungen rundherum.</li>
                <li>Aufgepasst mit Urban Gardening-Kisten! Auf Tiefgaragen und versiegelten Böden sind sie sinnvoll, nicht aber im Stadtpark. </li>
                <li>Die Umnutzung von Industrie- und Gewerbegebieten muss von den Aussenräumen her gedacht werden. Identitäten sind bereits heute zu sichern.</li>
                <li>Synergien suchen und nutzen: Warum nicht Freizeitlärm mit dem Autolärm kombinieren?</li>
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
      title="Viele Schätze – eine reglementierte Leere – ein Eulachpark an der Schützenwiese:" 
      subtitle="Sechs Spaziergänge durch Winterthur"
    />

    <?php
    $text = '<p>«Mehr öffentliche Räume, wo etwas läuft und man sich treffen will» fordert der ETH-Soziologe Christian Schmid an der Stadtwerkstatt 2 und bezeichnet die Lärmkonflikte als ein zunehmendes Problem im öffentlichen Raum. Aus dem Buch «Urbane Qualitäten» zitiert er sechs Qualitätskriterien für den öffentlichen Raum: 1. Zentralität; 2. Diversität; 3. Interaktion; 4. Zugänglichkeit; 5 Adaptierbarkeit; 6. Aneignung.</p>
             <p>«Der Strassenraum in Winterthur ist schlimm! Erst recht, wenn man bedenkt, dass die Strassenräume die sozialen Räume der Zukunft sind», sagt der Landschaftsarchitekt Günther Vogt. Er weist darauf hin, dass wir uns zu 90% in Strassenräumen bewegen und nicht in Pärken. Strassenräume sind aber stark reglementiert, es ist kaum mehr möglich, Bäume zu pflanzen. Die Angst vor Dichte sei angesichts der guten Erreichbarkeit von grossen Landschaftsräumen (Bodensee-Rücken, Toggenburg) unbegründet. Zudem plädiert Vogt für informelle Aneignungen. Die Leute sollten gefragt werden, was sie machen wollen, nicht was sie brauchen.</p> 
             <p>Wo stiften Freiräume Identität — für das Quartier und für Winterthur? Wie werden sie genutzt? Wo fehlen Freiräume? Diese Fragen begleiten die 60 Stadtwerkstätterinnen und Stadtwerkstätter auf den sechs Spaziergängen. Ihre Beobachtungen überprüfen sie anschliessend am Stadtmodell der Künstler Ron Temperli und Dominik Heim, um die Erkenntnisse in zehnminütigen Präsentationen auf den Punkt zu bringen. Am Schluss wird alles auf ein prägnantes Fazit eingedampft.</p>';
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
          title="Spaziergang 1: VELTHEIM &mdash; WOLFENSBERG &mdash; SCHÜTZENWIESE" 
        />
        <ul class="list mt-0">
          <li>Viele, kleine Quartierpärke und -plätze fallen auf.</li>
          <li>In Veltheim stimmt die Dorfidylle: hier treffen Menschen aufeinander, weil sie nirgends in einer Tiefgarage verschwinden. Was könnte bei zunehmender Verdichtung ein Ersatz für solche Idyllen sein?</li>
          <li>Die Schützenwiese beeindruckt mit ihrer Weite. Aber die Zäune stören, und man fragt sich, ob es sich hier wirklich um einen öffentlichen Raum für alle handelt.</li>
          <li>Die vielen Fussballplätze sind im Prinzip öffentlich. Trotzdem werden sie eher von wenigen genutzt. Eine Polyfunktionalität müsste das Ziel sein und würde für Vielfalt sorgen.</li>
          <li>Die Vorstellung eines zweiten Eulachparks wird wach: von der Schützenwiese über die geöffnete Püntenkolonie beidseits der Eulach.</li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 2: KIRCHE SEEN &mdash; BAHNHOF HEGI" 
        />
        <ul class="list mt-0">
          <li>Zwei markante Zonen werden sichtbar: es gibt den vernetzten, räumlich gehaltenen Teil (Seen) und den unvernetzten, räumlich ungefassten Teil (Bahnhof Hegi Süd).</li>
          <li>Im Gebiet Hegi Süd fühlt man sich als Fussgänger deplatziert, hier ist der schnelle, motorisierte Verkehr König.</li>
          <li>Die Schiessanlage Ohrbühl dominiert und man ahnt: diese Anlage hätte trotz der vielen Verbotstafeln grosses Potenzial für andere Nutzungen. </li>
          <li>Hegi Süd ist ein Entwicklungsgebiet, das klare Qualitäten braucht. Denn die Menschen, die hier arbeiten, haben eine attraktive Umgebung verdient.</li>
          <li>Für eine gute Entwicklung ist bereits heute auf architektonische und räumliche Qualität zu achten, denn was heute gebaut/abgerissen wird, steht/fehlt morgen.</li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 3: BAHNHOF OBERI DER EULACH ENTLANG BIS ZUR ALTSTADT" 
        />
        <ul class="list mt-0">
          <li>Der Eulachpark ist robust und scheint bis 2040 bestens tauglich zu sein. Trotzdem tauchen Nutzungskonflikte auf.</li>
          <li>Das Potenzial der Eulach ist enorm: viele neue Freiräume wären hier möglich. Wichtig ist, dass auch unkonventionelle Nutzungen Platz finden können: z.B. die Party unter der Brücke.</li>
          <li>Auch Tiere und Pflanzen müssen und sollen vom Eulachraum profitieren. </li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 4: ROSENBERG &mdash; GLEISRAUM &mdash; ALTSTADT" 
        />
        <ul class="list mt-0">
          <li>Eine grossartige Überraschung: Die zwei Kilometer lange Achse für Fussgänger — vom Lindberg zur Banane.</li>
          <li>In der Haldengut-Überbauung fällt auf: der öffentliche Raum im Eigentumsbereich ist abgesperrt, im Mietbereich zugänglich und rege genutzt.</li>
          <li>Das Areal um den Roten Turm ist trist! Das wäre eine ideale Brache für die Urban Gardening-Kisten, die im Stadtgarten nichts verloren haben.</li>
          <li>Die verkehrsbefreite Stadthausstrasse könnte die neue Steinberggasse sein.</li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 5: DÄTTNAU &mdash; STEIG &mdash; TÖSS &mdash; VOGELSANG" 
        />
        <ul class="list mt-0">
          <li>Verbindungen sind hier Mangelware! </li>
          <li>Erholungsräume wie die Kart-Bahn oder das Kinderparadies sind mit dem öV nicht erschlossen.</li>
          <li>Restflächen werden schlau als Nischen genutzt: zum Beispiel die Pünten beim NOK. «Quer-Feld-ein»-Qualitäten sind allenthalben zu entdecken.</li>
          <li>Im Zusammenhang mit dem Brüttener Tunnel muss das ganze Areal von Kempt bis Rieter neu gedacht werden. Warum nicht ein stolzes Verbindungselement mit echten Aufenthaltsqualitäten?</li>
          <li>Gegenüber dem «House of Claudia» wäre ein Bahnhof angebracht.</li>
        </ul>
      </article>
      <article class="text">
        <x-heading 
          type="h3" 
          title="Spaziergang 6: BREITE &mdash; MATTENBACH &mdash; TECHNIKUM" 
        />
        <ul class="list mt-0">
          <li>Welche Schätze! Und welche Vielfalt an Freiräumen: Der Waldrand mit Feuerstellen, das Alpfeeling auf der Breitewiese, die Viehweide auf der Zeughauswiese, der freigelegte Mattenbach im Eisweiherquartier, der gut bespielte Viehmarkt.</li>
          <li>Die reglementierte Leere auf dem Teuchelweiher ist trostlos. Sie könnte eine Chance sein, aber ist es dafür der richtige Ort?</li>
          <li>Ein direkter Zugang zum Mattenbach und ein Weg entlang der Eulach auf Wasserniveau wären wünschbar.</li>
          <li>Die Zeughauswiese liesse sich mit Zwischennutzungen aktivieren.</li>
          <li>Mehr Biodiversität in der Bepflanzung des öffentlichen Raumes ist nötig.</li>
        </ul>
      </article>
    </div>
    <div class="grid grid-cols-12">
      <article class="teaser no-line">
        <div>
          <a href="/assets/media/downloads/faw_dokumentation_stadtwerkstatt_2.pdf" class="anchor anchor--file " target="_blank" title="Download Dokumentation Stadtwerkstatt 2">
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
        <h3>Spaziergang Veltheim</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/XNsCE4S4hNw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Seen – Hegi</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/M-EkQdJ2vrI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Eulach</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/L6ysPi-sew4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Rosenberg</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/unK_QzGKj8k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Dättnau – Vogelsang</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/1eT63ABQDQs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
      <article class="video">
        <h3>Spaziergang Breite – Mattenbach</h3>
        <div class="ratio-container is-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/Q09Et1Kib68" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </article>
    </div>
  </div>
</section>
@endsection