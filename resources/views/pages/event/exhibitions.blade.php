@extends('layout.web')
@section('seo_title', 'Unser Bahnhof Winterthur • Veranstaltungen')
@section('seo_description', '')
@section('content')
@if ($page)
  @if ($page->publishedImage)
    <section class="content-visual">
      <div>
        <x-image 
          :maxSizes="[1200 => 1800, 0 => 1200]" 
          width="1200"
          height="800"
          :image="$page->publishedImage" 
          ratio="3x2" 
          wrapperClass="visual"
        />
      </div>
    </section>
  @endif
  <section class="content">
    <div>
      <h1>{{ $page->title }}</h1>
      @if ( $page->subtitle)
        <h2>{{ $page->subtitle }}</h2>
      @endif
      @if ($page->text)
        <article class="lead block md:hide">
          @if (Str::wordCount($page->text) > 60)
            <x-truncated-text preview="{!! Str::words($page->text, 60, ' ...') !!}">
              {!! $page->text !!}
            </x-truncated-text>
          @else
            {!! $page->text !!}
          @endif
        </article>
        <article class="lead hide !md:block">
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
            <x-image :maxSizes="[0 => 900]" width="900" height="600" :image="$article->publishedImage" ratio="3x2" wrapperClass="lg:span-6" />
          @endif
          <div class="lg:span-6">
            <x-heading 
              type="h2" 
              :title="$article->title"
              :subtitle="$article->subtitle"
            />
            {!! $article->text !!}
            @if ($article->galleries)
              <div class="text-media__links">
                @foreach($article->galleries as $gallery)
                  <x-link-page 
                    url="{{ route('page.gallery', ['page' => $page->slug, 'article' => $article->id, 'gallery' => $gallery->id, 'gallery_slug' => $gallery->slug]) }}" 
                    target="_self" 
                    text="{{ $gallery->link_text }}" 
                    title="{{ $gallery->title ? $gallery->title : '' }}"
                    hash="{{ $gallery->slug }}"
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
