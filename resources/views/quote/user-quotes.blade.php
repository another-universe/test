@extends('layouts.page')

@section('title', __('quote/list.title.user_quotes'))

@section('content')
<h1>{{ __('quote/list.title.user_quotes') }}</h1>
<x-quote.quotes-list :quotes="$quotes" template-type="user_quotes" />
@endsection
