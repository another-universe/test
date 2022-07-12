<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Kernel\Routing\Controller;
use App\Actions\User\LoginUserAction;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

final class LoginController extends Controller
{
    /**
     * Show login page.
     */
    public function index(): Response
    {
        return \response()->view('login.index');
    }

    /**
     * Handle the user authentication attempt.
     */
    public function handleLoginAttempt(LoginRequest $request): JsonResponse
    {
        $action = \app(LoginUserAction::class);

        $action
            ->useSession($request->shouldRemember())
            ->execute($request->getAuthUser());

        return \response()->json([
            'message' => 'Logged in',
        ]);
    }
}
