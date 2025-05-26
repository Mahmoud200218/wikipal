<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Sport;
use App\Services\LatestNewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SportsController extends Controller
{
    public $latestNews;

    public function __construct(LatestNewsService $latestNews)
    {
        $this->latestNews = $latestNews;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Auth::user()->sports()->latest()->paginate(10);
        $sportsList = Auth::user()->sports()->latest()->paginate(20);
        $LastSports = Auth::user()->sports()->latest()->first();
        $sportsCount = Auth::user()->sports()->count();
        return view('dashboard.sports.index', compact('sports', 'sportsList', 'LastSports', 'sportsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'short_title' => 'required|string|max:50000',
            'cover_image' => 'required',
            'cover_image_description' => 'nullable|string|max:20000',
            'source_url_one' => 'nullable',
            'source_url_two' => 'nullable',
            'source_url_three' => 'nullable',
            'first_description' => 'required|string',
            'second_description' => 'nullable|string',
            'other_image' => 'nullable',
        ]);


        $user = Auth::user();
        $data = $request->all();

        // Upload Cover Image | sports
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $sports_cover_image_path = $file->store('/sports', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $sports_cover_image_path;
        }

        // Upload Other Image | sports
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $sports_other_image_path = $file->store('/sports', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $sports_other_image_path;
        }

        // Update Audio File | Opinions
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/sports', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $user->sports()->create($data);
        return redirect()->route('dashboard.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        $latestNews = $this->latestNews->getLatestNews();
        return view('dashboard.sports.show', compact('sport', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sport = Sport::findOrFail($id);
        return view('dashboard.sports.edit', compact('sport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $sport = Auth::user()->sports()->findOrFail($id);

        $old_image = $sport->cover_image;
        $other_image = $sport->other_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/sports', ['disk' => 'public']);
            }
            $data['cover_image'] = $path;
        }

        // Update Other Image | Sports
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $sport_other_image_path = $file->store('/sports', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $sport_other_image_path;
        }

        // Update Audio File | Sports
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/sports', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $sport->update($data);

        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        if ($other_image && isset($data['other_image'])) {
            Storage::disk('public')->delete($other_image);
        }

        if ($other_image && isset($data['podcast'])) {
            Storage::disk('public')->delete($other_image);
        }

        return redirect()->route('dashboard.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $sport = $user->sports()->findOrFail($id);

        // Delete cover image from storage
        if ($sport->cover_image) {
            Storage::disk('public')->delete($sport->cover_image);
        }

        // Delete other image from storage
        if ($sport->other_image) {
            Storage::disk('public')->delete($sport->other_image);
        }

        // Delete podcast from storage
        if ($sport->podcast) {
            Storage::disk('public')->delete($sport->podcast);
        }

        $sport->delete();

        return redirect()->route('dashboard.delete');
    }
}
