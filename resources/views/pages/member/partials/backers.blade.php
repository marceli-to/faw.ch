@if ($backers)
<section class="content">
  <div>
    <h1>Gönner:Innen</h1>
    <div class="columns">
      @if (isset($backers['Personen']))
        <h2 class="lg:mb-0">Personen</h2>
        @foreach($backers['Personen'] as $backer)
          <div class="mb-1x">{{ $backer->full }}</div>
        @endforeach
      @endif
      @if (isset($backers['Firmen']))
        <h2 class="mt-8x md:mt-10x lg:mb-0">Firmen</h2>
        @foreach($backers['Firmen'] as $backer)
          <div class="mb-1x">{{ $backer->full }}</div>
        @endforeach
      @endif
    </div>
  </div>
</section>
@endif