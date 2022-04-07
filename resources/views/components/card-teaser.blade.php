<article class="card {{ $cssClass ?? ''}}">
  @if ($teaser->image)
    <x-image 
      :maxSizes="[0 => [900,600]]" 
      :image="$teaser->image" 
      ratio="true" 
    />
  @endif
  @if ($teaser->title)
    <x-heading type="h2" title="{{ $teaser->title }}" subtitle="{{ $teaser->subtitle }}" />
  @endif
  @if ($teaser->text)
    <div>{{nl2br($teaser->text)}}</div>
  @endif
  @if ($teaser->links)
    @foreach($teaser->links as $link)
      <div class="mt-4x">
        <x-link-page url="{{$link->url}}" target="{{$link->target}}" text="{{$link->title}}" title="{{$teaser->title}}" />
      </div>
    @endforeach
  @endif      
</article>