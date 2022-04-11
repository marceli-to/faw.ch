<?php
$text = '<p>Das Forum Architektur Winterthur setzt sich aus damals gegründet, um an die &lt;Werkstadtgespräche&gt; des SIA zur städtebaulichen Entwicklung auf dem Sulzerareal Stadtmitte anzuschliessen – setzt das Forum Architektur Win terthur (FAW) Zeichen für Innovation, Voraussicht und Qualität in Städtebau und Architektur. Mit regelmässigen Anlässen, Vorträgen, Ausstellungen und Begehungen thematisiert das Forum diese Fragen im Grossraum Win terthur und regt den öffentlichen Diskurs an.</p><p>Erkenntnisse daraus führten oft zu Entscheidungen, welche die Entwicklung Winterthurs in den letzten 20 Jahren massgeblich prägten. Das Forum Architektur Winterthur setzt sich aus damals gegründet, um an die &lt;Werkstadtgespräche&gt; des SIA zur städtebaulichen Entwicklung auf dem Sulzerareal Stadtmitte anzuschliessen – setzt das Forum Architektur Winterthur (FAW) Zeichen für Innovation, Voraussicht und Qualität in Städtebau und Architektur. Mit regelmässigen Anlässen, Vorträgen, Ausstellungen und Begehungen thematisiert das Forum diese Fragen im Grossraum Winterthur und regt den öffentlichen Diskurs an. Erkenntnisse daraus führten oft zu Entscheidungen, welche die Entwicklung.</p>';
?>
<section class="content">
  <div>
    <h1>Unterstützung für das Forum</h1>
    <article class="lead block md:hide">
      @if (Str::wordCount($text) > 100)
        <x-truncated-text preview="{!! Str::words($text, 100, '...') !!}">
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
<section class="content">
  <div>
    <h1>Werden Sie Mitglied</h1>
    <div id="app-member">
      <member-form></member-form>
    </div>
  </div>
</section>