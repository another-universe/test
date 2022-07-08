@extends('layouts.page')

@section('title', __('register/register_page.title'))

@section('content')
<h1>{{ __('register/register_page.title') }}</h1>
<x-register-form />
@endsection

@push('scripts')
<script src="{{ mix('assets/js/register-page.js') }}" defer></script>
@endpush
