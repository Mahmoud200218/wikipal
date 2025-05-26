<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Style;
use App\Services\LatestNewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StylesController extends Controller
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
        $styles = Auth::user()->styles()->latest()->paginate(10);
        $stylesList = Auth::user()->styles()->latest()->paginate(20);
        $LastStyle = Auth::user()->styles()->latest()->first();
        $stylesCount = Auth::user()->styles()->count();
        return view('dashboard.styles.index', compact('styles', 'stylesList', 'LastStyle', 'stylesCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.styles.create');
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

        // Upload Cover Image | styles
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $styles_cover_image_path = $file->store('/styles', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $styles_cover_image_path;
        }

        // Upload Other Image | styles
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $styles_other_image_path = $file->store('/styles', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $styles_other_image_path;
        }

        // Update Audio File | Styles
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/styles', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $user->styles()->create($data);
        return redirect()->route('dashboard.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Style $style)
    {
        $latestNews = $this->latestNews->getLatestNews();
        return view('dashboard.styles.show', compact('style', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $style = Style::findOrFail($id);
        return view('dashboard.styles.edit', compact('style'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $style = Auth::user()->styles()->findOrFail($id);

        $old_image = $style->cover_image;
        $other_image = $style->other_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/styles', ['disk' => 'public']);
            }
            $data['cover_image'] = $path;
        }

        // Update Other Image | Styles
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $style_other_image_path = $file->store('/styles', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $style_other_image_path;
        }

        // Update Audio File | Styles
        if ($request->hasFile('podcast')) {
            $file = $request->file('podcast');
            if ($file->isValid()) {
                $path = $file->store('/styles', ['disk' => 'public']);
            }
            $data['podcast'] = $path;
        }

        $style->update($data);

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
        $style = $user->styles()->findOrFail($id);

        // Delete cover image from storage
        if($style->cover_image){
            Storage::disk('public')->delete($style->cover_image);
        }

        // Delete other image from storage
        if($style->other_image){
            Storage::disk('public')->delete($style->other_image);
        }

        // Delete podcast from storage
        if($style->podcast){
            Storage::disk('public')->delete($style->podcast);
        }

        $style->delete();

        return redirect()->route('dashboard.delete');
    }
}
