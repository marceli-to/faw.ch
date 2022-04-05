@extends('layout.web')
@section('content')
@php $text_intro = 'Wir wollen deine Meinung wissen. Klick auf den Plusbutton unten rechts um deine Ideen zu teilen. Du kannst auch Beiträge kommentieren und Liken. Faccuptatus a imus dolupta teserro et fuga. Ut vidi ni occus alitibus mi num assectur tatius et optatiatati occabore, conecus con pa suntiorione nes inctist que aci corehenimpos eum corepere voluptat. Quidel est, consequid quo que namust pos iniam dit, conserum eruntent, velignime cusdandae qui ut laborehendi andaeptaquae aped quatem qui invel et voluptaeped modisqu odignim iliatur errum, odi repe ditiae lictemp elessit que as conecat ionsequia.';@endphp
<section class="content is-first">
  <div>
    <h1>Teile Deine Ideen</h1>
    <article class="lead">
      {!! $text_intro !!}
    </article>
    <div class="ratio-container is-1x2 sm:is-3x2">
      <iframe src="https://padlet.com/embed/g8h4epjqouxam9hj" frameborder="0" allow="camera;microphone;geolocation"></iframe>
    </div>
  </div>
</section>
@if ($activity)
  <section class="content">
    <div>
      <h1>Aktivitäten</h1>
      <x-heading type="h2" title="{{ $activity->title }}" />
      <article class="lead">
        {!! $activity->text !!}
      </article>
      @if ($activity->publishedArticles)
        <div class="grid grid-cols-12">
          @foreach($activity->publishedArticles as $article)
            <article class="text">
              <x-heading type="h3" title="{{ $article->title }}" subtitle="{{ $article->subtitle }}" />
              {!! $article->text !!}
              @if ($article->publishedFiles)
                <div class="mt-7x">
                  @foreach($article->publishedFiles as $file)
                    <div class="mb-2x lg:mb-3x">
                      <x-link-file :file="$file" cssClass="is-grid" />
                    </div>
                  @endforeach
                </div>
              @endif
              @if ($article->publishedLinks)
                <div>
                  @foreach($article->publishedLinks as $link)
                    <div class="mb-2x lg:mb-3x">
                      <x-link-page url="{{$link->url}}" target="{{$link->target}}" text="{{$link->title}}" title="{{$link->title}}" cssClass="is-grid" />
                    </div>
                  @endforeach
                </div>
              @endif
            </article>

          @endforeach
        </div>
      @endif
    </div>
  </section>
@endif
@endsection