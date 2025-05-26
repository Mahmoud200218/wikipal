<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminPasswordController extends Controller
{
    /**
     * Update the admin's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validateWithBag('updatePassword', [
            'current_password' => ['required','current_password:admin'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $admin = $request->user('admin');

        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'password-updated');
    }
}
