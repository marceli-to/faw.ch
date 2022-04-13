@extends('layout.web')
@section('seo_title', 'Kalender • Veranstaltungen')
@section('seo_description', '')
@section('content')
<section class="content is-first">
  <div>
    <h1>Kalender</h1>
    @if ($events['upcoming'] || $events['sticky'])
      <div class="grid grid-cols-12">
        @if ($events['upcoming'])
          @foreach($events['upcoming'] as $event)
            <x-card-event :event="$event" cssClass="md:span-6 lg:span-4" />
          @endforeach
        @endif
        @if ($events['sticky'])
          @foreach($events['sticky'] as $event)
            <x-card-event :event="$event" cssClass="md:span-6 lg:span-4" />
          @endforeach
        @endif
      </div>
      <div class="grid grid-cols-12">
        <article class="teaser">
          <h3>Weitere Veranstaltungen in Winterthur</h3>
          <x-link-page url="https://marceli.to" target="_blank" text="baukulturwinterthur.ch" title="baukulturwinterthur.ch" />
          <x-link-page url="https://marceli.to" target="_blank" text="unser-bahnhof-winterthur.ch" title="unser-bahnhof-winterthur.ch" />
        </article>
      </div>
    @endif
  </div>
</section>
<section class="content">
  <div>
    <h2 class="mb-10x lg:mb-10x">Vergangene Veranstaltungen</h2>
    <div class="grid grid-cols-12">
      @foreach($events['past'] as $event)
        <x-card-event :event="$event" cssClass="card-small md:span-6 lg:span-4 {{ $loop->iteration > 3 ? 'hide !md:block' : ''}}" />
      @endforeach
    </div>
    <div class="mt-10x md:mt-12x lg:mt-14x">
      <x-link-page url="{{ route('page.event.archive') }}" target="_self" text="Archiv" title="Archiv" />
    </div>
  </div>
</section>
@if ($annual_program)
  @if ($annual_program->publishedImages)
  <section class="content-visual" id="jahresprogramm">
    <x-gallery :images="$annual_program->publishedImages" limit="true" />
  </section>
  @endif
  <section class="content">
    <div>
      <h1>Jahresprogramm</h1>
      <x-heading type="h2" title="{{ $annual_program->title }}" subtitle="{{ $annual_program->subtitle }}" />

      @if ($annual_program->text)
        <article class="lead block md:hide">
          @if (Str::wordCount($annual_program->text) > 100)
            <x-truncated-text preview="{!! Str::words($annual_program->text, 100, '...') !!}">
              {!! $annual_program->text !!}
            </x-truncated-text>
          @else
            {!! $annual_program->text !!}
          @endif
        </article>
        <article class="lead hide !md:block">
          {!! $annual_program->text !!}
        </article>
      @endif

      @if ($annual_program->publishedArticles)
        <div class="grid grid-cols-12">
          @foreach($annual_program->publishedArticles as $article)
            <article class="text block !md:hide collapsible is-article {{ $loop->last ? 'is-last' : '' }} {{ $loop->first ? 'is-expanded' : '' }} js-clpsbl">
              <a href="javascript:;" class="btn-collapsible js-clpsbl-btn">
                <span>
                  <x-heading type="h3" title="{{ $article->title }}" subtitle="{{ $article->subtitle }}" />
                </span>
                <x-icon type="chevron-down" />
                <x-icon type="chevron-up" />
              </a>
              <div class="js-clpsbl-body" style="display: {{ $loop->first ? 'grid' : 'none' }}">
                {!! $article->text !!}
              </div>
            </article>

            <article class="text hide !md:block">
              <x-heading type="h3" title="{{ $article->title }}" subtitle="{{ $article->subtitle }}" />
              <x-truncated-text preview="{!! Str::words($article->text, 50, '...') !!}">
                {!! $article->text !!}
              </x-truncated-text>
            </article>
          @endforeach
        </div>
      @endif
    </div>
  </section>
  @if ($annual_program->publishedArticlesSpecial)
  <section class="content">
    <div>
      <x-heading type="h2" title="Forum Spezial" subtitle="Weitere Veranstaltungen" class="mb-10x lg:mb-12x" />
      @if ($annual_program->publishedArticlesSpecial)
        <div class="grid grid-cols-12">
          @foreach($annual_program->publishedArticlesSpecial as $article)
            <article class="text">
              <x-heading type="h3" title="{{ $article->title }}" subtitle="{{ $article->subtitle }}" />
              @if (Str::wordCount($article->text) >= 65)
                <x-truncated-text preview="{!! Str::words($article->text, 60, '...') !!}">
                  {!! $article->text !!} a
                </x-truncated-text>
              @else
                {!! $article->text !!} b
              @endif
            </article>
          @endforeach
        </div>
      @endif
      <div class="grid grid-cols-12">
        <article class="teaser line-thin">
          @if ($annual_program->publishedFiles)
            @foreach($annual_program->publishedFiles as $file)
              <div>
                <x-link-file :file="$file" />
              </div>
            @endforeach
          @endif
          <x-link-page url="{{ route('page.event.archive') }}" target="_self" text="Archiv" title="Archiv" />
        </article>
      </div>
    </div>
  </section>
  @endif
@endif
@endsection