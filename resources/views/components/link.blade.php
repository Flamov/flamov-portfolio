<a href="{{ $url }}" class="link {{ $icon }}" @if ($icon === 'external') target="_blank" rel="noopener noreferrer" @endif>
	<span class="text">
		{{ $text }}
	</span>
	@if ($icon === 'arrow')
		<svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" class="icon">
			<path d="M17.92,7.38a1,1,0,0,0-.22-1.09l-6-6a1,1,0,0,0-1.41,1.41L14.59,6H1A1,1,0,0,0,1,8H14.59l-4.29,4.29a1,1,0,1,0,1.41,1.41l6-6A1,1,0,0,0,17.92,7.38Z" class="icon-layer" />
		</svg>
	@elseif ($icon === 'external')
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="icon">
			<path d="M16,10a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V6A1,1,0,0,1,3,5H9A1,1,0,0,0,9,3H3A3,3,0,0,0,0,6V17a3,3,0,0,0,3,3H14a3,3,0,0,0,3-3V11A1,1,0,0,0,16,10Z" class="icon-layer" />
			<path d="M19.92.62A1,1,0,0,0,19,0H13a1,1,0,0,0,0,2h3.59L7.29,11.29a1,1,0,1,0,1.41,1.41L18,3.41V7a1,1,0,0,0,2,0V1A1,1,0,0,0,19.92.62Z" class="icon-layer arrow" />
		</svg>
	@endif
</a>
