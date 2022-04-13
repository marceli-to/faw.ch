<{{ $type}} {{ $attributes }}>
  {!! $title !!}
  @if($subtitle)
    <br><x-icon type="dash" />{!! $subtitle !!}
  @endif
</{{ $type }}>