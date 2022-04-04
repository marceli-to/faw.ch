@extends('layout.web')
@section('content')
<section class="content-visual is-hero">
  <div>
    <figure class="visual">
      <img src="/assets/media/dummy.jpg" width="1500" height="1000" title="">
    </figure>
  </div>
</section>
@include('pages.member.partials.form')
@include('pages.member.partials.sponsors')
@include('pages.member.partials.backers')
@include('pages.member.partials.network')


@endsection



 