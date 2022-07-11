@extends('layouts.page')

@section('title', __('quote/create_page.title'))

@section('content')
<h1>{{ __('quote/create_page.title') }}</h1>
<x-quote.create-form />
@endsection

@push('scripts')
<script src="{{ mix('assets/js/quote-create-page.js') }}" defer></script>
@endpush
