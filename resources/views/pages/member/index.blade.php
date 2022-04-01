@extends('layout.web')
@section('content')
<section class="content-visual is-hero">
  <div>
    <figure class="visual">
      <img src="/assets/media/dummy.jpg" width="1500" height="1000" title="">
    </figure>
  </div>
</section>
<section class="content">
  <div>
    <h1>Unterstützung für das Forum</h1>
    <article class="lead">
      <p>Das Forum Architektur Winterthur setzt sich aus damals gegründet, um an die &lt;Werkstadtgespräche&gt; des SIA zur städtebaulichen Entwicklung auf dem Sulzerareal Stadtmitte anzuschliessen – setzt das Forum Architektur Win terthur (FAW) Zeichen für Innovation, Voraussicht und Qualität in Städtebau und Architektur. Mit regelmässigen Anlässen, Vorträgen, Ausstellungen und Begehungen thematisiert das Forum diese Fragen im Grossraum Win terthur und regt den öffentlichen Diskurs an.</p>
      <p>Erkenntnisse daraus führten oft zu Entscheidungen, welche die Entwicklung Winterthurs in den letzten 20 Jahren massgeblich prägten. Das Forum Architektur Winterthur setzt sich aus damals gegründet, um an die &lt;Werkstadtgespräche&gt; des SIA zur städtebaulichen Entwicklung auf dem Sulzerareal Stadtmitte anzuschliessen – setzt das Forum Architektur Winterthur (FAW) Zeichen für Innovation, Voraussicht und Qualität in Städtebau und Architektur. Mit regelmässigen Anlässen, Vorträgen, Ausstellungen und Begehungen thematisiert das Forum diese Fragen im Grossraum Winterthur und regt den öffentlichen Diskurs an. Erkenntnisse daraus führten oft zu Entscheidungen, welche die Entwicklung.</p>
    </article>
  </div>
</section>
<section class="content">
  <div>
    <h1>Werden Sie Mitglied</h1>
    <form>
      @csrf
      <div class="form-group grid-cols-12">
        <div class="md:span-6">
          <input type="text" name="name" placeholder="Name">
        </div>
        <div class="md:span-6">
          <input type="text" name="firstname" placeholder="Vorname">
        </div>
      </div>
      <div class="form-group grid-cols-12">
        <div class="md:span-6">
          <input type="text" name="address" placeholder="Adresse">
        </div>
        <div class="md:span-6">
          <div class="sm:grid-cols-12">
            <div class="span-4 md:span-3">
              <input type="text" name="zip" placeholder="PLZ">
            </div>
            <div class="span-8 md:span-9">
              <input type="text" name="city" placeholder="Wohnort">
            </div>
          </div>
        </div>
      </div>
      <div class="form-group grid-cols-12">
        <div class="md:span-6">
          <input type="text" name="name" placeholder="Name">
        </div>
        <div class="md:span-6">
          <input type="text" name="firstname" placeholder="Vorname">
        </div>
      </div>
    </form>
  </div>
</section>
@endsection



 