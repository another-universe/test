<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Kernel\Routing\Controller;
use App\Actions\User\LogoutAction;
use Illuminate\Http\RedirectResponse;

final class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): RedirectResponse
    {
        $action = \app(LogoutAction::class);
        $action->useSession()->execute();

        return \redirect()->route('home');
    }
}
