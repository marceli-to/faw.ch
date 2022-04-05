@extends('layout.web')
@section('content')
<section class="content-visual is-hero">
  <div>
    <x-image :image="$page->publishedImage" maxWidth="2400" maxHeight="1600" ratio="3:2" wrapperClass="visual" />
  </div>
</section>
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
      <article class="page">
        <x-image :image="$article->publishedImage" maxWidth="1200" maxHeight="800" ratio="3:2" wrapperClass="lg:span-6" />
        <div class="lg:span-6">
          <h2>{{$article->title}}</h2>
          {!! $article->text !!}
          @if ($article->galleries)
            <div>
              @foreach($article->galleries as $gallery)
                <x-link-page 
                  url="https://marceli.to" 
                  target="_blank" 
                  text="{{$gallery->link_text}}" 
                  title="{{$gallery->title}}" 
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
@endsection
