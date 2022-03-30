@extends('layout.web')
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
        <x-card-event :event="$event" cssClass="card-small md:span-6 lg:span-4" />
      @endforeach
    </div>
    <div class="mt-10x md:mt-12x lg:mt-14x">
      <x-link-page url="{{ route('page.event.archive') }}" target="_self" text="Archiv" title="Archiv" />
    </div>
  </div>
</section>
<section class="content-visual">
  <x-gallery :images="$annual_program->publishedImages" limit="true" />
</section>
<section class="content">
  <div>
    <h1>Jahresprogramm</h1>
    <x-heading type="h2" title="{{ $annual_program->title }}" subtitle="{{ $annual_program->subtitle }}" />

    @if ($annual_program->text)
      <article class="lead mobile-only">
        <x-truncated-text preview="{!! Str::words($annual_program->text, 100, '...') !!}">
          {!! $annual_program->text !!}
        </x-truncated-text>
      </article>
      <article class="lead desktop-only">
        {!! $annual_program->text !!}
      </article>
    @endif

    @if ($annual_program->publishedArticles)
      <div class="grid grid-cols-12">
        @foreach($annual_program->publishedArticles as $article)
          <article class="text md:span-6 lg:span-4">
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
          <article class="text md:span-6 lg:span-4">
            <x-heading type="h3" title="{{ $article->title }}" subtitle="{{ $article->subtitle }}" />
            <x-truncated-text preview="{!! Str::words($article->text, 50, '...') !!}">
              {!! $article->text !!}
            </x-truncated-text>
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
@endsection