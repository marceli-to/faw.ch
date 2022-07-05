<article class="card is-home md:span-6 lg:span-4">

  @if ($teaser->link)
  
    <a href="{{ $teaser->link->url }}" target="{{ $teaser->link->target }}">
      @if ($teaser->image)
        <x-image 
          :maxSizes="[0 => 900]" 
          width="900" 
          height="600" 
          :image="$teaser->image" 
          ratio="3x2" 
        />
      @endif
      @if ($teaser->title)
        <x-heading type="h2" title="{{ $teaser->title }}" subtitle="{{ $teaser->subtitle }}" />
      @endif
     
      @if ($teaser->text)
        <div>{{nl2br($teaser->text)}}</div>
      @endif

      <div class="mt-4x">
        <span class="anchor anchor--arrow">
          <x-icon type="arrow-right" />
          <span>{{$teaser->link->title}}</span>
        </a>
      </div>
    </a>

  @else

    @if ($teaser->image)
      <x-image 
        :maxSizes="[0 => 900]" 
        width="900" 
        height="600" 
        :image="$teaser->image" 
        ratio="3x2" 
      />
    @endif

    @if ($teaser->title)
      <x-heading type="h2" title="{{ $teaser->title }}" subtitle="{{ $teaser->subtitle }}" />
    @endif

    @if ($teaser->text)
      <div>{{nl2br($teaser->text)}}</div>
    @endif

  @endif
</article>