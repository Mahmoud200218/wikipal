<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FacebookService;
use App\Services\TwitterService;
use App\Services\LinkedInService;

class SocialMediaController extends Controller
{
    protected $twitter;

    public function __construct(TwitterService $twitter)
    {
        $this->twitter = $twitter;
    }

    public function sharePost(Request $request)
    {
        $message = $request->input('message');
        $link = $request->input('link');

        $this->twitter->postToTwitter($message);

        return response()->json(['status' => 'Post shared successfully!']);
    }
}
