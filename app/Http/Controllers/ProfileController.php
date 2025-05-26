<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Dashboard\Opinion;
use App\Models\User;
use App\Services\LatestNewsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function user_profile()
    {
        $user = Auth::user();

        $opinions = DB::table('opinions')->where('user_id', $user->id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'opinions' as category"));
        $politics = DB::table('politics')->where('user_id', $user->id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'politics' as category"));
        $business = DB::table('businesses')->where('user_id', $user->id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'businesses' as category"));
        $styles = DB::table('styles')->where('user_id', $user->id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'styles' as category"));
        $travel = DB::table('travel')->where('user_id', $user->id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'travel' as category"));
        $sports = DB::table('sports')->where('user_id', $user->id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'sports' as category"));
        $stories = DB::table('stories')->where('user_id', $user->id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'stories' as category"));
        $tech = DB::table('technologies')->where('user_id', $user->id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'technologies' as category"));

        $allNews = $opinions->union($politics)
            ->union($business)
            ->union($styles)
            ->union($travel)
            ->union($sports)
            ->union($stories)
            ->union($tech)->orderBy('id', 'desc')->paginate(10);

        $allNewsCount = $opinions->union($politics)
            ->union($business)
            ->union($styles)
            ->union($travel)
            ->union($sports)
            ->union($stories)
            ->union($tech)
            ->count();

        $bookmarkCount = $user->bookmarks()->count();

        $feedbackCount = $user->contacts()->count();

        return view(
            'profile.user_profile',
            [
                'user' => $user,
                'allNews' => $allNews,
                'allNewsCount' => $allNewsCount,
                'bookmarkCount' => $bookmarkCount,
                'feedbackCount' => $feedbackCount,
            ]
        );
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
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

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function report_user($id)
    {
        $user = User::find($id);
        $user->increment('reports');
        $user->save();
        return redirect()->back()->with('success', 'User reported successfully');
    }


    public function trust_point($id)
    {
        $user = User::find($id);
        $user->increment('trust_points');
        $user->save();
        return redirect()->back()->with('success', 'User trust point added successfully');
    }
}
