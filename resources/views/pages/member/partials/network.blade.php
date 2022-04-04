<section class="content">
  <div>
    <h1>Netzwerk</h1>
    @if ($partners)
      @foreach($partners as $partner)
        <div class="mb-8x md:mb-10x">
          @if ($partner->url)
            <a href="{{ $partner->url }}" target="_blank" title="Webseite {{ $partner->name }}">{{ $partner->name }}<br>{{ $partner->url }}</a>
          @else
            {{ $partner->name }}
          @endif
        </div>
      @endforeach
    @endif
  </div>
</section>