<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\LatestNewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
