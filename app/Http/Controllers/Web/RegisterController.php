<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Kernel\Routing\Controller;
use App\Models\User;
use App\Actions\User\CreateUserAction;
use App\Actions\User\LoginUserAction;
use App\DataTransferObjects\User\CreateUserData;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

final class RegisterController extends Controller
{
    /**
     * Show register page.
     */
    public function index(): Response
    {
        return \response()->view('register.index');
    }

    /**
     * Handle the user registration request.
     */
    public function handleRegister(RegisterRequest $request): JsonResponse
    {
        $data = CreateUserData::fromRequest($request);
        $action = \app(CreateUserAction::class);

        $action
            ->onCreated(static function (User $user) {
                \app(LoginUserAction::class)
                    ->useSession(true)
                    ->execute($user);

                return true;
            })
            ->execute($data);

        return \response()->json([
            'message' => 'Registered',
        ], 201);
    }
}
