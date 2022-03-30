@if ($images)
<div class="grid grid-cols-12">
  @foreach($images as $image)
    <x-image :image="$image" maxWidth="900" maxHeight="600" ratio="3:2" wrapperClass="{{ $limit && $loop->iteration > 1 ? 'desktop-only' : 'span-12' }} lg:span-6 is-responsive" />
  @endforeach
</div>
@endif