<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Kernel\Routing\Controller;
use App\Kernel\Http\Concerns\Quote\AuthorizesRequests;

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
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
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
