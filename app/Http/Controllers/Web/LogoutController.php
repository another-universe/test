<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Kernel\Routing\Controller;
use App\Actions\User\LogoutUserAction;
use Illuminate\Http\RedirectResponse;

final class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): RedirectResponse
    {
        $action = \app(LogoutUserAction::class);
        $action->useSession()->execute();

        return \redirect()->route('home');
    }
}
