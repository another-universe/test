@extends('layouts.page')

@section('title', __('login/login_page.title'))

@section('content')
<h1>{{ __('login/login_page.title') }}</h1>
<x-login-form />
@endsection

@push('scripts')
<script src="{{ mix('assets/js/login-page.js') }}" defer></script>
@endpush
