<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Business;
use App\Models\Dashboard\Opinion;
use App\Models\Dashboard\Politics;
use App\Models\Dashboard\Sport;
use App\Models\Dashboard\Story;
use App\Models\Dashboard\Style;
use App\Models\Dashboard\Technology;
use App\Models\Dashboard\Travel;
use App\Models\Donate;
use App\Models\Payments\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function front()
    {
        $opinions = Opinion::where('status', 'accepted')->latest()->paginate(5);
        $lastPolitics = Politics::where('status', 'accepted')->latest()->first();
        $lastBusiness = Business::where('status', 'accepted')->latest()->first();
        $lastStyle = Style::where('status', 'accepted')->latest()->first();
        $lastStory = Story::where('status', 'accepted')->latest()->first();
        $stories = Story::where('status', 'accepted')->paginate(1);
        $businesses = Business::where('status', 'accepted')->paginate(1);
        $politics = Politics::where('status', 'accepted')->paginate(1);
        $techs = Technology::where('status', 'accepted')->paginate(1);
        $sportsList = Sport::where('status', 'accepted')->latest()->paginate(3);
        $technologyList = Technology::where('status', 'accepted')->latest()->paginate(3);
        $bussinessList = Business::where('status', 'accepted')->latest()->paginate(3);
        $travelList = Travel::where('status', 'accepted')->latest()->paginate(3);
        $stylesList = Style::where('status', 'accepted')->latest()->paginate(3);
        $storiesList = Story::where('status', 'accepted')->latest()->paginate(3);

        $topDonors =  DB::table('donates')
            ->select(
                'donater_name',
                'message',
                'price',
                'other_price',
                DB::raw('COALESCE(other_price, CAST(price AS UNSIGNED)) as actual_price')
            )
            ->orderByDesc(DB::raw('COALESCE(other_price, CAST(price AS UNSIGNED))'))
            ->limit(3)
            ->get();

        return view('front', [
            'opinions' => $opinions,
            'lastPolitics' => $lastPolitics,
            'lastBusiness' => $lastBusiness,
            'lastStyle' => $lastStyle,
            'lastStory' => $lastStory,
            'stories' => $stories,
            'businesses' => $businesses,
            'politics' => $politics,
            'techs' => $techs,
            'sportsList' => $sportsList,
            'technologyList' => $technologyList,
            'bussinessList' => $bussinessList,
            'travelList' => $travelList,
            'stylesList' => $stylesList,
            'storiesList' => $storiesList,
            'topDonors' => $topDonors,
        ]);
    }

    public function politics()
    {
        $politics = Politics::latest()->paginate(12);
        return view('front.politics.index', compact('politics'));
    }

    public function politics_details($id)
    {
        $politics = Politics::findOrFail($id);
        return view('front.politics.details', compact('politics'));
    }

    public function opinions()
    {
        $opinions = Opinion::latest()->paginate(12);
        return view('front.opinions.index', compact('opinions'));
    }

    public function opinions_details($id)
    {
        $opinion = Opinion::findOrFail($id);
        return view('front.opinions.details', compact('opinion'));
    }

    public function sports()
    {
        $sports = Sport::latest()->paginate(12);
        return view('front.sports.index', compact('sports'));
    }

    public function sports_details($id)
    {
        $sports = Sport::findOrFail($id);
        return view('front.sports.details', compact('sports'));
    }

    public function businesses()
    {
        $businesses = Business::latest()->paginate(12);
        return view('front.businesses.index', compact('businesses'));
    }

    public function businesses_details($id)
    {
        $businesses = Business::findOrFail($id);
        return view('front.businesses.details', compact('businesses'));
    }

    public function travels()
    {
        $travels = Travel::latest()->paginate(12);
        return view('front.travels.index', compact('travels'));
    }

    public function travels_details($id)
    {
        $travels = Travel::findOrFail($id);
        return view('front.travels.details', compact('travels'));
    }

    public function styles()
    {
        $styles = Style::latest()->paginate(12);
        return view('front.styles.index', compact('styles'));
    }

    public function styles_details($id)
    {
        $styles = Style::findOrFail($id);
        return view('front.styles.details', compact('styles'));
    }

    public function techs()
    {
        $techs = Technology::latest()->paginate(12);
        return view('front.techs.index', compact('techs'));
    }

    public function techs_details($id)
    {
        $techs = Technology::findOrFail($id);
        return view('front.techs.details', compact('techs'));
    }

    public function stories()
    {
        $stories = Story::latest()->paginate(12);
        return view('front.stories.index', compact('stories'));
    }

    public function stories_details($id)
    {
        $stories = Story::findOrFail($id);
        return view('front.stories.details', compact('stories'));
    }

    public function donate()
    {

        return view('front.donate.donate', [
            'methods' => PaymentMethod::active()->get()
        ]);
    }

    public function userOverview($id)
    {

        $user = User::findOrFail($id);

        $opinions = DB::table('opinions')->where('user_id', $id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'opinions' as category"));
        $politics = DB::table(('politics'))->where('user_id', $id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'politics' as category"));
        $business = DB::table('businesses')->where('user_id', $id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'businesses' as category"));
        $styles = DB::table('styles')->where('user_id', $id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'styles' as category"));
        $travel = DB::table('travel')->where('user_id', $id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'travel' as category"));
        $sports = DB::table('sports')->where('user_id', $id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'sports' as category"));
        $stories = DB::table('stories')->where('user_id', $id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'stories' as category"));
        $tech = DB::table('technologies')->where('user_id', $id)->select('id', 'title', 'short_title', 'podcast', 'created_at', DB::raw("'technologies' as category"));

        $allNews = $opinions->union($politics)
            ->union($business)
            ->union($styles)
            ->union($travel)
            ->union($sports)
            ->union($stories)
            ->union($tech)->orderBy('id', 'desc')->paginate(10);

        $allNewsCount = $opinions->union($politics)
            ->union($business)
            ->union($styles)
            ->union($travel)
            ->union($sports)
            ->union($stories)
            ->union($tech)->count();

        $bookmarkCount = $user->bookmarks()->count();

        $feedbackCount = $user->contacts()->count();

        $trustPointsCount = $user->trust_points;


        return view('front.pages.user_overview', [
            'user' => $user,
            'bookmarkCount' => $bookmarkCount,
            'feedbackCount' => $feedbackCount,
            'allNews' => $allNews,
            'allNewsCount' => $allNewsCount,
            'trustPointsCount' => $trustPointsCount
        ]);
    }

    public function welcome()
    {
        return view('front.pages.welcome');
    }

    public function about_us()
    {
        return view('front.pages.about');
    }

    public function team()
    {
        return view('front.pages.team');
    }

    public function faq()
    {
        return view('front.pages.faq');
    }

    public function deactivated()
    {
        return view('front.pages.deactivated');
    }

    public function access_denied()
    {
        return view('front.pages.access_denied');
    }

    public function searchOnContent(Request $request)
    {
        $query = $request->input('query');
        $collection = collect([
            Opinion::where('title', 'LIKE', '%' . $query . '%')->orWhere('short_title', 'LIKE', '%' . $query . '%')->get(),
            Politics::where('title', 'LIKE', '%' . $query . '%')->orWhere('short_title', 'LIKE', '%' . $query . '%')->get(),
            Business::where('title', 'LIKE', '%' . $query . '%')->orWhere('short_title', 'LIKE', '%' . $query . '%')->get(),
            Sport::where('title', 'LIKE', '%' . $query . '%')->orWhere('short_title', 'LIKE', '%' . $query . '%')->get(),
            Story::where('title', 'LIKE', '%' . $query . '%')->orWhere('short_title', 'LIKE', '%' . $query . '%')->get(),
            Technology::where('title', 'LIKE', '%' . $query . '%')->orWhere('short_title', 'LIKE', '%' . $query . '%')->get(),
            Travel::where('title', 'LIKE', '%' . $query . '%')->orWhere('short_title', 'LIKE', '%' . $query . '%')->get(),
            Style::where('title', 'LIKE', '%' . $query . '%')->orWhere('short_title', 'LIKE', '%' . $query . '%')->get(),
        ]);

        $result = $collection->flatten();
        $count = $result->count();

        return view('front.search.content', compact('result', 'count'));
    }

    public function payment_success()
    {
        return view('front.pages.payment_success');
    }

    public function payment_failed()
    {
        return view('front.pages.payment_failed');
    }
}
