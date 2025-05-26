<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Business;
use App\Services\LatestNewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
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
        $business = Auth::user()->business()->latest()->paginate(10);
        $businessList = Auth::user()->business()->latest()->paginate(20);
        $LastBusiness = Auth::user()->business()->latest()->first();
        $businessCount = Auth::user()->business()->count();
        return view('dashboard.business.index', compact('business', 'businessList', 'LastBusiness', 'businessCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.business.create');
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

        // Upload Cover Image | business
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $business_cover_image_path = $file->store('/business', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $business_cover_image_path;
        }

        // Upload Other Image | business
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $business_other_image_path = $file->store('/business', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $business_other_image_path;
        }

        // Update Audio File | Opinions
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/opinions', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $user->business()->create($data);
        return redirect()->route('dashboard.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        $latestNews = $this->latestNews->getLatestNews();
        return view('dashboard.business.show', compact('business', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $business = Business::findOrFail($id);
        return view('dashboard.business.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $business = Auth::user()->business()->findOrFail($id);

        $old_image = $business->cover_image;
        $other_image = $business->other_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/business', ['disk' => 'public']);
            }
            $data['cover_image'] = $path;
        }

        // Update Other Image | Business
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $business_other_image_path = $file->store('/business', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $business_other_image_path;
        }

        // Update Audio File | Business
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/business', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $business->update($data);

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
        $business = $user->business()->findOrFail($id);

        // Delete cover image from storage
        if ($business->cover_image) {
            Storage::disk('public')->delete($business->cover_image);
        }

        // Delete other image from storage
        if ($business->other_image) {
            Storage::disk('public')->delete($business->other_image);
        }

        // Delete podcast from storage
        if ($business->podcast) {
            Storage::disk('public')->delete($business->podcast);
        }

        $business->delete();

        return redirect()->route('dashboard.delete');
    }
}
