<header class="navbar navbar-dark sticky-top bg-dark flex-nowrap p-0 shadow">
<a href="{{ lroute('home') }}" class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6">
{{ config('app.name') }}
</a>

@auth
<x-page-header-menu.user-menu />
@else
<x-page-header-menu.guest-menu />
@endif
</header>
