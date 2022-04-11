<div>
  @if ($preview) {!! $preview !!} @endif
</div>
<x-link-more text="Mehr" />
<div class="js-hidden" style="display: none">
  {{ $slot }}
  <x-link-less text="Weniger" />
</div>