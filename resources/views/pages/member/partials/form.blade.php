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
          <input type="text" name="name" placeholder="Telefon">
        </div>
        <div class="md:span-6">
          <input type="text" name="firstname" placeholder="E-Mail">
        </div>
      </div>
      <div class="grid-cols-12">
        <div class="md:span-6">
          <div class="form-group">
            <div class="flex items-start">
              <input type="radio" id="member" name="member_type" required="" value="1">
              <label for="member">Ich trete dem Forum Architektur Winterthur als Mitglied bei. Der Mitgliederbeitrag für das laufende Vereinsjahr von CHF 60.– wird in den nächsten Tagen auf das Postcheck-Konto 84-4044-1 überwiesen.</label>
            </div>
          </div>
          <div class="form-group">
            <div class="flex items-start">
              <input type="radio" id="junior_member" name="member_type" required="" value="1">
              <label for="junior_member">Ich trete dem Forum Architektur Winterthur als Jungmitglied (für Studierende und Personen in Ausbildung) bei und sende die Ausbildungsbestätigung an info@forum-architektur.ch. Der Mitgliederbeitrag für das laufende Vereinsjahr* von CHF 30.- wird in den nächsten Tagen auf das Postcheck-Konto 84-4044-1 überwiesen.</label>
            </div>
          </div>
        </div>
        <div class="md:span-6">
          <div class="form-group">
            <div class="flex items-start">
              <input type="radio" id="backer" name="member_type" required="" value="1">
              <label for="backer">Ich trete dem Forum Architektur Winterthur als Gönnerin oder Gönner bei. Der Gönnerbeitrag für das laufende Vereinsjahr von CHF 600.– wird in den nächsten Tagen auf das Postcheck-Konto 84-4044-1 überwiesen.</label>
            </div>
          </div>
          <div class="form-group">
            <div class="flex items-start">
              <input type="radio" id="sponsor" name="member_type" required="" value="1">
              <label for="sponsor">Wir sind interessiert das Forum Architektur Winterthur als Sponsor mit jährlich CHF 2'750.– zu unterstützen. Bitte nehmen Sie mit uns Kontakt auf.</label>
            </div>
          </div>
        </div>
      </div>
      <div>
        <input type="submit" value="Anmeldung Absenden" name="submit" class="btn-submit">
      </div>
    </form>
  </div>
</section>