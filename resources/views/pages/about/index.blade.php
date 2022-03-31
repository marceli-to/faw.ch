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
    <h1>Das Forum</h1>
    <p>[Inhalt folgt]</p>
  </div>
</section>

@if ($history)
  @if ($history->publishedImages)
    <section class="content-visual">
      <x-gallery :images="$history->publishedImages" limit="true" />
    </section>
  @endif
  <section class="content">
    <div>
      <h1>{{ $history->title }}</h1>
      @if ($history->publishedArticles)
        <div class="grid grid-cols-12">
          @foreach($history->publishedArticles as $article)
            <article class="text">
              <x-heading type="h2" title="{{ $article->title }}" class="mb-1x" />
              <x-truncated-text preview="{!! Str::words($article->text, 50, '...') !!}">
                {!! $article->text !!}
              </x-truncated-text>
            </article>
          @endforeach
        </div>
      @endif
      @if ($history->publishedFiles)
        <x-toggle-text title="Download Jahresberichte" cssClass="mt-6x" class="mt-8x md:mt-0">
          <div class="columns-3" style="max-width: 640px">
            @foreach($history->publishedFiles as $file)
              <div><x-link-file :file="$file" /></div>
            @endforeach
          </div>
        </x-toggle-text>
      @endif
    </div>
  </section>
@endif
@endsection