<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationController extends Controller
{
    public function notice(): View
    {
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return to_route('auth.create');
    }

    public function send(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

}
