@extends('layout.web')
@section('seo_title', 'Debatten')
@section('seo_description', 'Wir möchten das Wissen und die Ansprüche der Winterthurerinnen und Winterthurer an ihre Stadt sichtbar machen und die Debatte über die gebaute Form der Stadt pflegen. Teile deine Sicht der Dinge mit uns und der Öffentlichkeit')
@section('content')
@php $text_intro = 'Wir möchten das Wissen und die Ansprüche der Winterthurerinnen und Winterthurer an ihre Stadt sichtbar machen und die Debatte über die gebaute Form der Stadt pflegen. Ja, Städtebau ist eine öffentliche Angelegenheit! Als Vermittler zwischen Fachwelt und der Bevölkerung haben wir ein offenes Ohr für Themen, die wir noch nicht erkannt haben. Deshalb freuen wir uns auf deine Beteiligung an den Debatten. Teile deine Sicht der Dinge mit uns und der Öffentlichkeit! Klick auf den Plus-Button unten rechts, um deine Ideen und Fragen zu teilen. Du kannst auch Beiträge kommentieren und liken.';@endphp
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