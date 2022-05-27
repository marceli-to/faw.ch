@extends('layout.web')
@section('seo_title', 'Mitgliedschaft')
@section('seo_description', '')
@section('content')
<section class="content-visual">
  <div>
    <figure class="visual">
      <picture>
        <source 
          media="(min-width: 1200px)" 
          data-srcset="/assets/media/faw_mitgliedschaft-lg.jpg">
        <img 
          data-src="/assets/media/faw_mitgliedschaft-sm.jpg" 
          width="1200" height="800" title="" class="is-responsive lazy">
      </picture>
    </figure>
  </div>
</section>
@include('pages.member.partials.form')
@include('pages.member.partials.sponsors')
@include('pages.member.partials.backers')
@include('pages.member.partials.network')
@endsection



 