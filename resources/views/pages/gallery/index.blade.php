@extends('layout.lightbox')
@section('content')
<section class="content-lightbox">
  <div>
    <nav class="lightbox">
      <ul>
        <li>
          <a href="">
            <x-icon type="chevron-left-lightbox" />
          </a>
        </li>
        <li>
          <a href="">
            <x-icon type="chevron-right-lightbox" />
          </a>
        </li>
      </ul>
      <a href="/{{ $page->slug }}/#{{$gallery->slug}}" class="btn-lightbox-close">
        <x-icon type="cross-lightbox" />
      </a>
    </nav>
  </div>
  @if ($gallery)
    <div>
      <header>
        <x-heading type="h2" title="{{ $gallery->title }}" subtitle="{{ $gallery->subtitle }}" />
        <div class="uc">{{ $gallery->text }}</div>
      </header>
      @if ($gallery->publishedImages)
        @foreach($gallery->publishedImages as $image)
          <x-image :image="$image" maxWidth="1500" maxHeight="1000" ratio="3:2" wrapperClass="{{ !$loop->last ? 'mb-12x' : '' }}" showCaption="true" />
        @endforeach
      @endif
      @if ($gallery->credits)
        <footer>
          {!! nl2br($gallery->credits) !!}
        </footer>
      @endif
    </div>
  @endif
</section>
@endsection