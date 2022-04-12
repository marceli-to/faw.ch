<section class="content-visual">
  <div>
    <x-image 
      :maxSizes="[1200 => 1800, 0 => 1200]"
      width="1200"
      height="800" 
      :image="$hero" 
      ratio="3x2" 
      wrapperClass="visual"
    />
  </div>
</section>