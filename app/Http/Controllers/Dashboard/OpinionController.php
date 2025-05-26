<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Opinion;
use App\Services\LatestNewsService;
use App\Services\OpinionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OpinionController extends Controller
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
        $opinions = Auth::user()->opinions()->latest()->paginate(10);
        $opinionsList = Auth::user()->opinions()->latest()->paginate(20);
        $LastOpinion = Auth::user()->opinions()->latest()->first();
        $opinionsCount = Auth::user()->opinions()->count();
        return view('dashboard.opinions.index', compact('opinions', 'opinionsList', 'LastOpinion', 'opinionsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.opinions.create');
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
            'other_image' => 'nullable|mimes:jpg,png,jpeg,avif',
            'podcast' => 'nullable|mimes:mp3,wav,ogg|max:1040',
        ]);


        $user = Auth::user();
        $data = $request->all();

        // Upload Cover Image | Opinions
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $opinions_cover_image_path = $file->store('/opinions', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $opinions_cover_image_path;
        }

        // Upload Other Image | Opinions
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $opinions_other_image_path = $file->store('/opinions', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $opinions_other_image_path;
        }

        // Update Audio File | Opinions
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/opinions', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }


        $user->opinions()->create($data);
        return redirect()->route('dashboard.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Opinion $opinion)
    {
        $latestNews = $this->latestNews->getLatestNews();
        return view('dashboard.opinions.show', compact('opinion', 'latestNews'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $opinion = Opinion::findOrFail($id);
        return view('dashboard.opinions.edit', compact('opinion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $opinion = Auth::user()->opinions()->findOrFail($id);

        $old_image = $opinion->cover_image;
        $other_image = $opinion->other_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/opinions', ['disk' => 'public']);
            }
            $data['cover_image'] = $path;
        }

        // Update Other Image | Opinions
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $opinions_other_image_path = $file->store('/opinions', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $opinions_other_image_path;
        }

        // Update Audio File | Opinions
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/opinions', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $opinion->update($data);

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
        $opinion = $user->opinions()->findOrFail($id);

        // Delete cover image from storage
        if ($opinion->cover_image) {
            Storage::disk('public')->delete($opinion->cover_image);
        }

        // Delete other image from storage
        if ($opinion->other_image) {
            Storage::disk('public')->delete($opinion->other_image);
        }

        // Delete podcast from storage
        if ($opinion->podcast) {
            Storage::disk('public')->delete($opinion->podcast);
        }

        $opinion->delete();

        return redirect()->route('dashboard.delete');
    }
}
