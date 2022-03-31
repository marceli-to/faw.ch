<div {{ $attributes }}>
  <x-link-toggle text="{{ $title }}" />
  <div class="{{ $cssClass }}" style="display: none">
    <div>{{ $slot }}</div>
  </div>
</div>

