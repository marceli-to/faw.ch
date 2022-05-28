@extends('layout.lightbox')
@section('content')
<section class="content-lightbox">
  <div>
    <nav class="lightbox">
      <a href="/{{ $page }}/#{{ $gallery->slug }}" class="btn-lightbox-close" title="Zurück">
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
          <x-image 
            :maxSizes="[1200 => 1500, 900 => 1200, 0 => 900]" 
            width="1200"
            height="840"
            :image="$image" 
            ratio="4x2.8" 
            wrapperClass="{{ !$loop->last ? 'mb-12x' : '' }}"
            showCaption="true"
          />
        @endforeach
      @endif
      @if ($gallery->publishedVideos)
        @foreach($gallery->publishedVideos as $video)
          <h2>{{$video->title}}</h2>
          <div class="{{ !$loop->last ? 'mb-12x' : '' }}">
            <div class="ratio-container is-16x9">
              {!! $video->code !!}
            </div>
          </div>
        @endforeach
      @endif
      @if ($gallery->credits)
        <footer>
          {!! nl2br($gallery->credits) !!}
        </footer>
      @endif
    </div>
  @endif
  <div>
    @include('pages.gallery.partials.browse', ['class' => 'is-bottom', 'hasClose' => FALSE])
  </div>
</section>
@endsection