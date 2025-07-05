<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $bookmark = $user->bookmarks()->create($data);

        return redirect()->back()->with('success', 'Bookmark created successfully.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $bookmark = $user->bookmarks()->findOrFail($id);

        $bookmark->delete();

        return redirect()->back()->with('success', 'Bookmark deleted successfully.');
    }
}
