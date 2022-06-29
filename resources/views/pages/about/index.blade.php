@extends('layout.web')
@section('seo_title', 'Über uns')
@section('seo_description', 'Das Forum und unsere Vorstandsmitglieder')
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
@if ($forum)
  @if ($forum->publishedImages)
    <section class="content-visual">
      <x-gallery :images="$forum->publishedImages" limit="true" />
    </section>
  @endif
  <section class="content" data-id="{{ \Str::slug($forum->title) }}">
    <div>
      <h1>{{ $forum->title }}</h1>
      @if ($forum->text)
        <article class="lead block md:hide">
          @if (Str::wordCount($forum->text) > 60)
            <x-truncated-text preview="{!! Str::words($forum->text, 60, '...') !!}">
              {!! $forum->text !!}
            </x-truncated-text>
          @else
            {!! $forum->text !!}
          @endif
        </article>
        <article class="lead hide !md:block">
          {!! $forum->text !!}
        </article>
      @endif
      @if ($forum->publishedArticles)
        <div class="grid grid-cols-12">
          @foreach($forum->publishedArticles as $article)
            <article class="text">
              <x-heading type="h2" title="{{ $article->title }}" class="mb-1x" />
                {!! $article->text !!}
            </article>
          @endforeach
        </div>
      @endif
      <div class="text-media__links">
        <x-link-gallery page="ueber-uns" :id="18" />
      </div>
      @if ($forum->publishedFiles)
        <x-toggle-text title="Download Jahresberichte" cssClass="mt-6x" class="mt-8x md:mt-0">
          <div class="columns-3" style="max-width: 640px">
            @foreach($forum->publishedFiles as $file)
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
  <section class="content" data-id="{{ \Str::slug($board->title) }}">
    <div>
      <h1>{{ $board->title }}</h1>
      @if ($board->text)
        <article class="lead block md:hide">
          @if (Str::wordCount($board->text) > 60)
            <x-truncated-text preview="{!! Str::words($board->text, 60, '...') !!}">
              {!! $board->text !!}
            </x-truncated-text>
          @else
            {!! $board->text !!}
          @endif
        </article>
        <article class="lead hide !md:block">
          {!! $board->text !!}
        </article>
      @endif

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