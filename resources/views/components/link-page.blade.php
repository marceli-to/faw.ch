<a href="{{ $url }}" class="anchor anchor--arrow {{ $cssClass }}" target="{{ $target }}" data-id="{{ \Str::slug($title) }}" title="{{ $title }}" {{ $attributes }}>
  <x-icon type="arrow-right" />
  <span>{{ $text }}</span>
</a>