<a href="#" id="headerLanguageDropdown" class="nav-link px-3 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">
{{ __('language_toggler.interface_language') }}
</a>

<ul class="dropdown-menu" aria-labelledby="headerLanguageDropdown">
@foreach ($items() as [$locale, $url, $active, $text])
<li role="presentation">
<a rel="alternate" hreflang="{{ $locale }}" href="{{ $url }}" @class(['dropdown-item', 'active' => $active]){!! $active ? ' aria-current="true"' : '' !!}>
{{ $text }}
</a>
</li>
@endforeach
</ul>
