@extends('layouts.page')

@section('title', __('quote/edit_page.title'))

@section('content')
<h1>{{ __('quote/edit_page.title') }}</h1>
<x-quote.edit-form :quote="$quote" />
@endsection

@push('scripts')
<script src="{{ mix('assets/js/quote-edit-page.js') }}" defer></script>
@endpush
