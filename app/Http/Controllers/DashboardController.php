<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Business;
use App\Models\Dashboard\Opinion;
use App\Models\Dashboard\Politics;
use App\Models\Dashboard\Sport;
use App\Models\Dashboard\Story;
use App\Models\Dashboard\Style;
use App\Models\Dashboard\Technology;
use App\Models\Dashboard\Travel;
use App\Models\Front\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\LatestNewsService;

use function Pest\Laravel\get;

class DashboardController extends Controller
{
    protected $latestNews;

    public function __construct(LatestNewsService $latestNews)
    {
        $this->latestNews = $latestNews;
    }
    public function dashboard()
    {
        $user = Auth::user();
        $opinionsCount = $user->opinions()->count();
        $politicsCount = $user->politics()->count();
        $stylesCount = $user->styles()->count();
        $storiesCount = $user->stories()->count();
        $techsCount = $user->techs()->count();
        $bussinessCount = $user->business()->count();
        $sportsCount = $user->sports()->count();
        $travelCount = $user->travel()->count();

        $politics = $user->politics()->latest()->paginate(8);
        $opinions = $user->opinions()->latest()->paginate(8);
        $styles = $user->styles()->latest()->paginate(8);
        $businesses = $user->business()->latest()->paginate(8);
        $travels = $user->travel()->latest()->paginate(8);
        $stories = $user->stories()->latest()->paginate(8);
        $techs = $user->techs()->latest()->paginate(8);
        $sports = $user->sports()->latest()->paginate(8);
        $bookmarks = $user->bookmarks()->latest()->get();


        // Latest Random News
        $latestNews = $this->latestNews->getLatestNews();

        // Latest Feeds
        $feedbacks = Contact::latest()->paginate(3);

        return view('dashboard', [
            'opinionsCount' => $opinionsCount,
            'politicsCount' => $politicsCount,
            'stylesCount' => $stylesCount,
            'storiesCount' => $storiesCount,
            'techsCount' => $techsCount,
            'bussinessCount' => $bussinessCount,
            'sportsCount' => $sportsCount,
            'travelCount' => $travelCount,
            'latestNews' => $latestNews,
            'feedbacks' => $feedbacks,
            'politics' => $politics,
            'opinions' => $opinions,
            'styles' => $styles,
            'businesses' => $businesses,
            'travels' => $travels,
            'stories' => $stories,
            'techs' => $techs,
            'sports' => $sports,
            'bookmarks' => $bookmarks
        ]);
    }

    public function show($id, $table)
    {
        $validTables = ['businesses', 'opinions', 'politics', 'sports', 'stories', 'styles', 'technologies', 'travel'];

        if (!in_array($table, $validTables)) {
            abort(404, 'Invalid table');
        }

        $news = DB::table($table)->find($id);

        if (!$news) {
            abort(404, 'News not found');
        }

        return view('news.details', compact('news'));
    }


    public function success()
    {
        return view('redirects.success');
    }

    public function update()
    {
        return view('redirects.update');
    }

    public function delete()
    {
        return view('redirects.delete');
    }

    public function fail()
    {
        return view('redirects.fail');
    }
}
