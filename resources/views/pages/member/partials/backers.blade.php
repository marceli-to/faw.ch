<section class="content">
  <div>
    <h1>Gönner*Innen</h1>
    @if ($backers)
      <div class="columns">
        @if ($backers['Personen'])
          <h2 class="lg:mb-0">Personen</h2>
          @foreach($backers['Personen'] as $backer)
            <div class="mb-1x">{{ $backer->full }}</div>
          @endforeach
        @endif
        @if ($backers['Firmen'])
          <h2 class="mt-8x md:mt-10x lg:mb-0">Firmen</h2>
          @foreach($backers['Firmen'] as $backer)
            <div class="mb-1x">{{ $backer->full }}</div>
          @endforeach
        @endif
      </div>
    @endif
  </div>
</section>