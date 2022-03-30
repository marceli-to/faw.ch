<a href="/storage/uploads/{{ $file->name }}" class="anchor anchor--file {{ $cssClass }}" target="_blank" title="{{ $file->caption ?? 'Download' }}">
  <x-icon type="file" />
  <span>{{ $file->caption ?? 'Download' }}</span>
</a>