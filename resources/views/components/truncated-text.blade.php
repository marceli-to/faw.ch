<div>
  @if ($preview) {!! $preview !!} @endif
</div>
<x-link-more text="Mehr" />
<div style="display: none">
  {{ $slot }}
  <x-link-less text="Weniger" />
</div>