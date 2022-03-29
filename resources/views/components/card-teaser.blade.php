<article class="text-media md:span-6 lg:span-4">
  @if ($teaser->image)
    <x-image :image="$teaser->image" maxWidth="900" maxHeight="600" ratio="3:2" />
  @endif
  @if ($teaser->title)
    <h2>{{$teaser->title}} @if ($teaser->subtitle)<br><x-icon type="dash" /> {{ $teaser->subtitle}}@endif</h2>
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