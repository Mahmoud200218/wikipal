<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    /**
     * Display the admin's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the admin's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $users = $request->user();
        $request->user()->fill($request->validated());

        $old_image = $users->avatar;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            if ($file->isValid()) {
                $path = $file->store('/avatars', [
                    'disk' => 'public'
                ]);
            }

            $users->avatar = $path;
        };

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $users->save();

        if ($old_image && isset($user['avatar'])) {
            Storage::disk('public')->delete($old_image);
        }

        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the admin's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password:admin'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
