@extends('layout.lightbox')
@section('content')
<section class="content-lightbox">
  <div>
    @include('pages.gallery.partials.browse', ['class' => 'is-top', 'hasClose' => TRUE])
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
      @if ($gallery->publishedVideos)
        @foreach($gallery->publishedVideos as $video)
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