@extends('layout.web')
@section('content')
@if ($page)
  @if ($page->publishedImage)
    <section class="content-visual is-hero">
      <div>
        <x-image :image="$page->publishedImage" maxWidth="2400" maxHeight="1600" ratio="3:2" wrapperClass="visual" />
      </div>
    </section>
  @endif
  <section class="content">
    <div>
      <h1>{{ $page->title }}</h1>
      @if ($page->text)
        <article class="lead mobile-only">
          <x-truncated-text preview="{!! Str::words($page->text, 55, '...') !!}">
            {!! $page->text !!}
          </x-truncated-text>
        </article>
        <article class="lead desktop-only">
          {!! $page->text !!}
        </article>
      @endif
    </div>
  </section>
  @if ($page->publishedArticles)
  <section class="content">
    <div>
      @foreach($page->publishedArticles as $article)
        <article class="text-media">
          @if ($article->publishedImage)
            <x-image :image="$article->publishedImage" maxWidth="1200" maxHeight="800" ratio="3:2" wrapperClass="lg:span-6" />
          @endif
          <div class="lg:span-6">
            <h2>{{$article->title}}</h2>
            {!! $article->text !!}
            @if ($article->galleries)
              <div class="text-media__links">
                @foreach($article->galleries as $gallery)
                  <x-link-page 
                    url="{{ route('page.gallery', ['page' => $page->slug, 'article' => $article->id, 'gallery' => $gallery->id, 'gallery_slug' => $gallery->slug]) }}" 
                    target="_self" 
                    text="{{ $gallery->link_text }}" 
                    title="{{ $gallery->title }}"
                    id="{{ $gallery->slug }}"
                    cssClass="mb-2x" />
                @endforeach
              </div>
            @endif
          </div>
        </article>
      @endforeach
    </div>
  </section>
  @endif
@endif
@endsection
