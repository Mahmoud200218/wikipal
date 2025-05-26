<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Story;
use App\Services\LatestNewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoriesController extends Controller
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
        $stories = Auth::user()->stories()->latest()->paginate(10);
        $storiesList = Auth::user()->stories()->latest()->paginate(20);
        $LastStory = Auth::user()->stories()->latest()->first();
        $storiesCount = Auth::user()->stories()->count();
        return view('dashboard.stories.index', compact('stories', 'storiesList', 'LastStory', 'storiesCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'short_title' => 'required|string|max:50000',
            'cover_image' => 'nullable|mimes:jpg,png,jpeg',
            'cover_image_description' => 'nullable|string|max:20000',
            'source_url_one' => 'nullable',
            'source_url_two' => 'nullable',
            'source_url_three' => 'nullable',
            'first_description' => 'required|string',
            'second_description' => 'nullable|string',
            'other_image' => 'nullable|mimes:jpg,png,jpeg',
        ]);


        $user = Auth::user();
        $data = $request->all();

        // Upload Cover Image | stories
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $stories_cover_image_path = $file->store('/stories', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $stories_cover_image_path;
        }

        // Upload Other Image | stories
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $stories_other_image_path = $file->store('/stories', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $stories_other_image_path;
        }

        // Update Audio File | Stories
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/stories', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $user->stories()->create($data);
        return redirect()->route('dashboard.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        $latestNews = $this->latestNews->getLatestNews();
        return view('dashboard.stories.show', compact('story', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $story = Story::findOrFail($id);
        return view('dashboard.stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $story = Auth::user()->stories()->findOrFail($id);

        $old_image = $story->cover_image;
        $other_image = $story->other_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/stories', ['disk' => 'public']);
            }
            $data['cover_image'] = $path;
        }

        // Update Other Image | Stories
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $story_other_image_path = $file->store('/stories', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $story_other_image_path;
        }

        // Update Audio File | Stories
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/stories', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $story->update($data);

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
        $story = $user->stories()->findOrFail($id);

        // Delete cover image from storage
        if($story->cover_image){
            Storage::disk('public')->delete($story->cover_image);
        }

        // Delete other image from storage
        if($story->other_image){
            Storage::disk('public')->delete($story->other_image);
        }

        // Delete podcast from storage
        if($story->podcast){
            Storage::disk('public')->delete($story->podcast);
        }

        $story->delete();

        return redirect()->route('dashboard.delete');
    }
}
