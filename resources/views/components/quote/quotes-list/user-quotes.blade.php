@if ($quotes->isNotEmpty())
<div class="list-group">

@foreach ($quotes as $quote)
<article class="list-group-item">
<blockquote>
{!! nl2br(e($quote->getText()), false) !!}
</blockquote>

<p class="mb-0">
{{ __('quote/list.shared') }} {{ ___('quote/list.times', $quote->getShared()) }}
</p>
<hr>
<a href="{{ lroute('quotes.edit', compact('quote')) }}">
{{ __('quote/list.edit') }}
</a>
</article>
@endforeach

</div>

{{ $quotes->links() }}

@else
<p>
{{ __('quote/list.no_results') }}.
</p>
@endif
