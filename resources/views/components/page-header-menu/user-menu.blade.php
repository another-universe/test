<div class="navbar-nav flex-row">
<div class="nav-item text-nowrap">
<a href="{{ lroute('quotes.user_quotes') }}" class="nav-link px-3">
{{ __('page_header_menu/user_menu.your_quotes') }}
</a>
</div>

<div class="nav-item text-nowrap">
<a href="{{ lroute('quotes.create') }}" class="nav-link px-3">
{{ __('page_header_menu/user_menu.add_quote') }}
</a>
</div>
</div>

<div class="navbar-nav flex-row ms-auto">
<div class="nav-item text-nowrap">
<button type="submit" form="_logout" class="nav-link px-3">
{{ __('page_header_menu/user_menu.logout') }}
</button>
</div>

<div class="nav-item text-nowrap dropdown">
<x-page-header-language-toggler />
</div>
</div>
