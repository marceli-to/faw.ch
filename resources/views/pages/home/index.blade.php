@extends('layout.web')
@section('content')
@if ($hero)
  <section class="content-visual">
    <div>
      <figure class="visual">
        <img src="/img/cache/{{$hero->name}}/1500/1000/{{$hero->coords}}" width="3000" height="2000">
      </figure>
    </div>
  </section>
@endif
<section class="content">
  <div>
    @if ($grid_items['events'])
    <div class="grid-cols-12">
      @foreach($grid_items['events'] as $item)
        <article class="text-media md:span-6">
          <figure>
            <img src="/assets/media/dummy.jpg" width="3000" height="2000">
          </figure>
          @if ($item->event->subtitle)
            <span class="topic">{{$item->event->subtitle}}</span>
          @endif
          <h2>
            @if ($item->event->date)
              {{$item->event->dateFull}}
            @endif
            Do 23.9.21, 18.30 Uhr<br><x-icon type="dash" />Die Auflösung der Tektonik Adhesives and Fusions
          </h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quaerat mollitia fugit rerum, molestias quo at iusto, ad voluptas impedit autem quam optio ducimus facere nam quisquam exercitationem deleniti eveniet.</p>
          <p>
            <a href="" class="anchor anchor--icon">
              <x-icon type="arrow-right" />
              <span>Zur Veranstaltung</span>
            </a>
          </p>
        </article>
      @endforeach
    </div>
    @endif

    <div class="grid-cols-12">
      <article class="text-media md:span-6 lg:span-4">
        <figure>
          <img src="/assets/media/dummy.jpg" width="3000" height="2000">
        </figure>
        <h2>Unser Bahnhof</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quaerat mollitia fugit rerum, molestias quo at iusto, ad voluptas impedit autem quam optio ducimus facere nam quisquam exercitationem deleniti eveniet.</p>
        <p>
          <a href="" class="anchor anchor--icon">
            <x-icon type="arrow-right" />
            <span>Zur Veranstaltung</span>
          </a>
        </p>      
      </article>
      <article class="text-media md:span-6 lg:span-4">
        <figure>
          <img src="/assets/media/dummy.jpg" width="3000" height="2000">
        </figure>
        <h2>Jahresprogramm 2020/2021<br><x-icon type="dash" />Urbane Brennpunkte</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quaerat mollitia fugit rerum, molestias quo at iusto, ad voluptas impedit autem quam optio ducimus facere nam quisquam exercitationem deleniti eveniet.</p>
        <p>
          <a href="" class="anchor anchor--icon">
            <x-icon type="arrow-right" />
            <span>Jahresprogramm</span>
          </a>
        </p>      
      </article>
      <article class="text-media md:span-6 lg:span-4">
        <figure>
          <img src="/assets/media/dummy.jpg" width="3000" height="2000">
        </figure>
        <h2>Fotodokumentation</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quaerat mollitia fugit rerum, molestias quo at iusto, ad voluptas impedit autem quam optio ducimus facere nam quisquam exercitationem deleniti eveniet.</p>
        <p>
          <a href="" class="anchor anchor--icon">
            <x-icon type="arrow-right" />
            <span>Winterthur im Bild</span>
          </a>
        </p>        
      </article>
    </div>
  </div>
</section>
@endsection