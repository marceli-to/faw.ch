<section class="content-visual is-hero">
  <div>
    <x-image 
      :maxSizes="[1200 => [1800,1200], 0 => [1200,800]]" 
      :image="$hero" 
      ratio="true" 
      wrapperClass="visual"
    />
  </div>
</section>