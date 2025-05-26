<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Travel;
use App\Services\LatestNewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TravelController extends Controller
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
        $travels = Auth::user()->travel()->latest()->paginate(10);
        $travelsList = Auth::user()->travel()->latest()->paginate(20);
        $LastTravel = Auth::user()->travel()->latest()->first();
        $travelsCount = Auth::user()->travel()->count();
        return view('dashboard.travel.index', compact('travels', 'travelsList', 'LastTravel', 'travelsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.travel.create');
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

        // Upload Cover Image | travel
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $travel_cover_image_path = $file->store('/travel', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $travel_cover_image_path;
        }

        // Upload Other Image | travel
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $travel_other_image_path = $file->store('/travel', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $travel_other_image_path;
        }

        // Update Audio File | Travel
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/travel', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $user->travel()->create($data);
        return redirect()->route('dashboard.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        $latestNews = $this->latestNews->getLatestNews();
        return view('dashboard.travel.show', compact('travel', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $travel = Travel::findOrFail($id);
        return view('dashboard.travel.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $travel = Auth::user()->travel()->findOrFail($id);

        $old_image = $travel->cover_image;
        $other_image = $travel->other_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/travel', ['disk' => 'public']);
            }
            $data['cover_image'] = $path;
        }

        // Update Other Image | Travel
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $travel_other_image_path = $file->store('/travel', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $travel_other_image_path;
        }

        // Update Audio File | Travel
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/travel', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $travel->update($data);

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
        $travel = $user->travel()->findOrFail($id);

        // Delete cover image from storage
        if ($travel->cover_image) {
            Storage::disk('public')->delete($travel->cover_image);
        }

        // Delete other image from storage
        if ($travel->other_image) {
            Storage::disk('public')->delete($travel->other_image);
        }

        // Delete podcast from storage
        if ($travel->podcast) {
            Storage::disk('public')->delete($travel->podcast);
        }

        $travel->delete();

        return redirect()->route('dashboard.delete');
    }
}
