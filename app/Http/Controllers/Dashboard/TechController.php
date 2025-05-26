<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Technology;
use App\Services\LatestNewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TechController extends Controller
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
        $techs = Auth::user()->techs()->latest()->paginate(10);
        $techsList = Auth::user()->techs()->latest()->paginate(20);
        $LastTech = Auth::user()->techs()->latest()->first();
        $techsCount = Auth::user()->techs()->count();
        return view('dashboard.tech.index', compact('techs', 'techsList', 'LastTech', 'techsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tech.create');
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

        // Upload Cover Image | tech
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $tech_cover_image_path = $file->store('/tech', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $tech_cover_image_path;
        }

        // Upload Other Image | tech
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $tech_other_image_path = $file->store('/tech', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $tech_other_image_path;
        }

        // Update Audio File | Technology
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/tech', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $user->techs()->create($data);
        return redirect()->route('dashboard.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $tech)
    {
        $latestNews = $this->latestNews->getLatestNews();
        return view('dashboard.tech.show', compact('tech', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tech = Technology::findOrFail($id);
        return view('dashboard.tech.edit', compact('tech'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $tech = Auth::user()->techs()->findOrFail($id);

        $old_image = $tech->cover_image;
        $other_image = $tech->other_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/tech', ['disk' => 'public']);
            }
            $data['cover_image'] = $path;
        }

        // Update Other Image | Techs
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $tech_other_image_path = $file->store('/tech', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $tech_other_image_path;
        }

        // Update Audio File | Techs
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/tech', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $tech->update($data);

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
        $tech = $user->techs()->findOrFail($id);

        // Delete cover image from storage
        if ($tech->cover_image) {
            Storage::disk('public')->delete($tech->cover_image);
        }

        // Delete other image from storage
        if ($tech->other_image) {
            Storage::disk('public')->delete($tech->other_image);
        }

        // Delete podcast from storage
        if ($tech->podcast) {
            Storage::disk('public')->delete($tech->podcast);
        }

        $tech->delete();

        return redirect()->route('dashboard.delete');
    }
}
