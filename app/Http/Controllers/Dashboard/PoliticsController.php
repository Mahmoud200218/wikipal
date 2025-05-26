<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Politics;
use App\Services\LatestNewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PoliticsController extends Controller
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
        $politics = Auth::user()->politics()->latest()->paginate(10);
        $politicsList = Auth::user()->politics()->latest()->paginate(20);
        $LastPolitics = Auth::user()->politics()->latest()->first();
        $politicsCount = Auth::user()->politics()->count();
        return view('dashboard.politics.index', compact('politics', 'politicsList', 'LastPolitics', 'politicsCount'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.politics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'short_title' => 'required|string|max:50000',
            'cover_image' => 'required|mimes:jpg,png,jpeg',
            'cover_image_description' => 'nullable|string|max:20000',
            'source_url_one' => 'nullable',
            'source_url_two' => 'nullable',
            'source_url_three' => 'nullable',
            'first_description' => 'required|string',
            'second_description' => 'nullable|string',
            'other_image' => 'nullable|mimes:jpg,png,jpeg,avif',
            'other_image_description' => 'nullable|string|max:500',
        ]);


        $user = Auth::user();
        $data = $request->all();

        // Upload Cover Image | Politics
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $politics_cover_image_path = $file->store('/politics', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $politics_cover_image_path;
        }

        // Upload Other Image | Politics
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $politics_other_image_path = $file->store('/politics', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $politics_other_image_path;
        }

        // Update Audio File | Politics
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/politics', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $user->politics()->create($data);
        return redirect()->route('dashboard.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Politics $politic)
    {
        $latestNews = $this->latestNews->getLatestNews();
        return view('dashboard.politics.show', compact('politic', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $politic = Politics::findOrFail($id);
        return view('dashboard.politics.edit', compact('politic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $politic = Auth::user()->politics()->findOrFail($id);

        $old_image = $politic->cover_image;
        $other_image = $politic->other_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/politics', ['disk' => 'public']);
            }
            $data['cover_image'] = $path;
        }

        // Update Other Image | Politics
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $politics_other_image_path = $file->store('/politics', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $politics_other_image_path;
        }

        // Update Audio File | Politics
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/politics', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $politic->update($data);

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
        $politic = $user->politics()->findOrFail($id);

        // Delete cover image from storage
        if ($politic->cover_image) {
            Storage::disk('public')->delete($politic->cover_image);
        }

        // Delete other image from storage
        if ($politic->other_image) {
            Storage::disk('public')->delete($politic->other_image);
        }

        // Delete podcast from storage
        if ($politic->podcast) {
            Storage::disk('public')->delete($politic->podcast);
        }

        $politic->delete();

        return redirect()->route('dashboard.delete');
    }
}
