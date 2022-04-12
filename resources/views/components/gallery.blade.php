@if ($images)
<div class="grid grid-cols-12">
  @foreach($images as $image)
    <x-image 
      :maxSizes="[1000 => 900, 0 => 1200]" 
      width="900"
      height="600"
      :image="$image" 
      ratio="3x2" 
      wrapperClass="{{ $limit && $loop->iteration > 1 ? 'desktop-only' : 'span-12' }} lg:span-6 is-responsive"
    />
  @endforeach
</div>
@endif