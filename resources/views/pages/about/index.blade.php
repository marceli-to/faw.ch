@extends('layout.web')
@section('seo_title', 'Über uns')
@section('seo_description', 'Das Forum und ihre Geschichte sowie unsere Vorstandsmitglieder')
@section('og_image', url('/') . '/assets/media/faw_ueber-uns-lg.jpg')
@section('content')
<section class="content-visual">
  <div>
    <figure class="visual">
      <picture>
        <source 
          media="(min-width: 1200px)" 
          data-srcset="/assets/media/faw_ueber-uns-lg.jpg">
        <img 
          data-src="/assets/media/faw_ueber-uns-sm.jpg" 
          width="1200" height="800" title="" class="is-responsive lazy">
      </picture>
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
              @if (Str::wordCount($article->text) > 60)
                <x-truncated-text preview="{!! Str::words($article->text, 60, '...') !!}">
                  {!! $article->text !!}
                </x-truncated-text>
              @else
                {!! $article->text !!}
              @endif
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

@if ($board)
  @if ($board->publishedImages)
    <section class="content-visual">
      <x-gallery :images="$board->publishedImages" limit="true" />
    </section>
  @endif
  <section class="content" name="{{ \Str::slug($board->title) }}">
    <div>
      <h1>{{ $board->title }}</h1>
      @if ($board->publishedMembers)
        <div class="grid grid-cols-12">
          @foreach($board->publishedMembers as $member)
            <article class="member">
              <h3>{{ $member->name }}</h3>
              {!! $member->text !!}
            </article>
          @endforeach
        </div>
      @endif
    </div>
  </section>
@endif
@endsection