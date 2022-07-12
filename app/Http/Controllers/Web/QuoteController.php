<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Kernel\Routing\Controller;
use App\Kernel\Http\Concerns\Quote\AuthorizesRequests;
use App\Models\Quote;
use App\Actions\Quote\CreateQuoteAction;
use App\Actions\Quote\EditQuoteAction;
use App\DataTransferObjects\Quote\CreateQuoteData;
use App\DataTransferObjects\Quote\EditQuoteData;
use App\Http\Requests\Quote\CreateRequest;
use App\Http\Requests\Quote\UpdateRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

final class QuoteController extends Controller
{
    use AuthorizesRequests;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->applyPolicies();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Display a listing of the resource owned by the authenticated user.
     */
    public function userQuotes(): Response
    {
        $user = \auth()->user();
        $quotes = $user->getQuotesWithPagination();

        return \response()->view('quote.user-quotes', \compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return \response()->view('quote.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): JsonResponse
    {
        $data = CreateQuoteData::fromRequest($request);
        $action = \app(CreateQuoteAction::class);
        $action->execute($data);

        return \response()->json([
            'message' => 'Created',
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quote): Response
    {
        return \response()->view('quote.edit', \compact('quote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Quote $quote): JsonResponse
    {
        $data = EditQuoteData::fromRequest($request);
        $action = \app(EditQuoteAction::class);
        $action->execute($quote, $data);

        return \response()->json([
            'message' => 'Updated',
        ]);
    }
}
