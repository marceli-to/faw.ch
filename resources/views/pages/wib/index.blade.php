@extends('layout.web')
@section('seo_title', 'Winterthur im Bild')
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
            <x-truncated-text preview="{!! Str::words($page->text, 60, '...') !!}">
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
        <article class="text-media" data-id="{{ \Str::slug($article->title)}}">
          @if ($article->publishedImage)
            <x-image :maxSizes="[0 => 900]" width="900" height="600" :image="$article->publishedImage" ratio="3x2" wrapperClass="lg:span-6" />
          @endif
          <div class="lg:span-6">
            <h2>{{$article->title}}</h2>
            {!! $article->text !!}
            @if ($article->galleries)
              <div class="text-media__links {{ $article->galleries->count() >= 6 ? 'columns-3' : '' }}">
                @foreach($article->galleries->sortBy('order') as $gallery)
                  <x-link-page 
                    url="{{ route('page.gallery', ['page' => $page->slug, 'article' => $article->id, 'gallery' => $gallery->id, 'gallery_slug' => $gallery->slug]) }}" 
                    target="_self" 
                    text="{{ $gallery->link_text }}" 
                    title="{{ $gallery->title ? $gallery->title : '' }}"
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
