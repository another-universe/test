<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Kernel\Routing\Controller;
use App\Kernel\Http\Concerns\Quote\AuthorizesRequests;
use App\Actions\Quote\CreateQuoteAction;
use App\DataTransferObjects\Quote\CreateQuoteData;
use App\Http\Requests\Web\Quote\CreateRequest;
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
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
    }
}
