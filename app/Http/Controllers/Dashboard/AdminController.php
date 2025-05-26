<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\AdminDeleteUser;
use App\Mail\AdminSuspendUser;
use App\Mail\AdminUnSuspendUser;
use App\Models\Admin;
use App\Models\Admin\QuickNews;
use App\Models\Ads;
use App\Models\Dashboard\Business;
use App\Models\Dashboard\Opinion;
use App\Models\Dashboard\Politics;
use App\Models\Dashboard\Sport;
use App\Models\Dashboard\Story;
use App\Models\Dashboard\Style;
use App\Models\Dashboard\Technology;
use App\Models\Dashboard\Travel;
use App\Models\Front\Contact;
use App\Models\User;
use App\Notifications\User\AcceptNewsUserNotification;
use App\Notifications\User\RejectNewsUserNotification;
use App\Notifications\User\TrustedUserNotification;
use App\Notifications\User\UnTrustedUserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {

        // Last 7 days user registration statistics
        $users = DB::table('users')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // تحويل البيانات إلى مصفوفات للعرض
        $labels = $users->pluck('date');
        $data = $users->pluck('count');



        // User statistics
        // منع القسمة على صفر بطريقة آمنة
        $totalUsers = DB::table('users')->count();
        $totalUsersSafe = $totalUsers > 0 ? $totalUsers : 1;

        $verifiedCount = DB::table('users')->where('trusted', 1)->count();
        $newCount = DB::table('users')->where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $suspendedCount = DB::table('users')->where('suspended', 1)->count();


        $admin = Auth::guard('admin')->user();
        $admins = Admin::where('super_admin', '0')->latest()->paginate(5);
        $super_admins = Admin::where('super_admin', '1')->latest()->paginate(10);
        $users = User::latest()->paginate(10);
        $latestContacts = Contact::latest()->paginate(5);

        // Fetching processes from different categories
        // بالتالي Eloquent Model بدل من DB::table انا بهاي الطريقة مستخدم 
        // وما بقدر استدعي مباشرة select() بتحتاج تحدد كل الأعمدة يدويًا في
        $opinions_process = DB::table('opinions')->where('status', 'in_process')->select('id', 'user_id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'opinions' as category"));
        $politics_process = DB::table('politics')->where('status', 'in_process')->select('id', 'user_id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'politics' as category"));
        $business_process = DB::table('businesses')->where('status', 'in_process')->select('id', 'user_id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'businesses' as category"));
        $styles_process = DB::table('styles')->where('status', 'in_process')->select('id', 'user_id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'styles' as category"));
        $travel_process = DB::table('travel')->where('status', 'in_process')->select('id', 'user_id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'travel' as category"));
        $sports_process = DB::table('sports')->where('status', 'in_process')->select('id', 'user_id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'sports' as category"));
        $stories_process = DB::table('stories')->where('status', 'in_process')->select('id', 'user_id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'stories' as category"));
        $tech_process = DB::table('technologies')->where('status', 'in_process')->select('id', 'user_id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'technologies' as category"));

        $processes = $opinions_process->union($politics_process)
            ->union($business_process)
            ->union($styles_process)
            ->union($travel_process)
            ->union($sports_process)
            ->union($stories_process)
            ->union($tech_process)->latest()->paginate(4);


        // Fetching accepted from different categories
        $opinions_accepted = DB::table('opinions')->where('status', 'accepted')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'opinions' as category"));
        $politics_accepted = DB::table('politics')->where('status', 'accepted')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'politics' as category"));
        $business_accepted = DB::table('businesses')->where('status', 'accepted')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'businesses' as category"));
        $styles_accepted = DB::table('styles')->where('status', 'accepted')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'styles' as category"));
        $travel_accepted = DB::table('travel')->where('status', 'accepted')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'travel' as category"));
        $sports_accepted = DB::table('sports')->where('status', 'accepted')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'sports' as category"));
        $stories_accepted = DB::table('stories')->where('status', 'accepted')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'stories' as category"));
        $tech_accepted = DB::table('technologies')->where('status', 'accepted')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'technologies' as category"));

        $accepted = $opinions_accepted->union($politics_accepted)
            ->union($business_accepted)
            ->union($styles_accepted)
            ->union($travel_accepted)
            ->union($sports_accepted)
            ->union($stories_accepted)
            ->union($tech_accepted)->latest()->paginate(4);


        // Fetching rejected from different categories
        $opinions_rejected = DB::table('opinions')->where('status', 'rejected')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'opinions' as category"));
        $politics_rejected = DB::table('politics')->where('status', 'rejected')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'politics' as category"));
        $business_rejected = DB::table('businesses')->where('status', 'rejected')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'businesses' as category"));
        $styles_rejected = DB::table('styles')->where('status', 'rejected')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'styles' as category"));
        $travel_rejected = DB::table('travel')->where('status', 'rejected')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'travel' as category"));
        $sports_rejected = DB::table('sports')->where('status', 'rejected')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'sports' as category"));
        $stories_rejected = DB::table('stories')->where('status', 'rejected')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'stories' as category"));
        $tech_rejected = DB::table('technologies')->where('status', 'rejected')->select('id', 'title', 'short_title', 'cover_image', 'created_at', DB::raw("'technologies' as category"));

        $reject = $opinions_rejected->union($politics_rejected)
            ->union($business_rejected)
            ->union($styles_rejected)
            ->union($travel_rejected)
            ->union($sports_rejected)
            ->union($stories_rejected)
            ->union($tech_rejected)->latest()->paginate(4);


        $trustedUsers = User::where('trusted', 'yes')->latest()->paginate(5);
        $suspendedUsers = User::where('suspended', 'yes')->latest()->paginate(5);

        $usersCount = User::count();

        $trustedUsersCount = User::where('trusted', 'yes')->count();
        $suspendedUsersCount = User::where('suspended', 'yes')->count();

        $quick_news = QuickNews::latest()->paginate(6);

        $trustedPoints = User::orderBy('trust_points', 'desc')->limit(8)->get();
        $reports = User::orderBy('reports', 'desc')->limit(8)->get();

        return view('admin.dashboard', [
            'admin' => $admin,
            'admins' => $admins,
            'super_admins' => $super_admins,
            'users' => $users,
            'latestContacts' => $latestContacts,
            'trustedUsers' => $trustedUsers,
            'suspendedUsers' => $suspendedUsers,
            'usersCount' => $usersCount,
            'trustedUsersCount' => $trustedUsersCount,
            'suspendedUsersCount' => $suspendedUsersCount,
            'processes' => $processes,
            'accepted' => $accepted,
            'reject' => $reject,
            'quick_news' => $quick_news,
            'trustedPoints' => $trustedPoints,
            'reports' => $reports,
            'labels' => $labels,
            'data' => $data,
            'verified' => $verifiedCount,
            'new' => $newCount,
            'suspended' => $suspendedCount,
            'total' => $totalUsersSafe
        ]);
    }

    public function changeNewsStatus(Request $request, $id)
    {
        $category = $request->category;
        $user_id = $request->user_id;

        $modelMap = [
            'opinions' => Opinion::class,
            'politics' => Politics::class,
            'businesses' => Business::class,
            'styles' => Style::class,
            'travel' => Travel::class,
            'sports' => Sport::class,
            'stories' => Story::class,
            'technologies' => Technology::class,
        ];

        if (!array_key_exists($category, $modelMap)) {
            return redirect()->back()->with('error', 'Invalid category!');
        }

        $model = $modelMap[$category];
        $record = $model::findOrFail($id);
        $record->status = $request->status;
        $record->save();

        $user = User::findOrFail($user_id);

        if ($record->status == 'accepted') {
            $user->notify(new AcceptNewsUserNotification($record));
        } elseif ($record->status == 'rejected') {
            $user->notify(new RejectNewsUserNotification($record));
        }

        return redirect()->back()->with('success', 'Status updated successfully.');
    }


    public function edit_profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function trustedUsers()
    {
        $trustedUsers = User::where('trusted', 'yes')->latest()->paginate(15);
        return view('admin.trusted_users', compact('trustedUsers'));
    }

    public function suspendedUsers()
    {
        $suspendedUsers = User::where('suspended', 'yes')->latest()->paginate(15);
        return view('admin.suspended_users', compact('suspendedUsers'));
    }

    public function changeSuspendedUsers(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $suspended = $request->suspended;

        $user->update([
            'suspended' => $request->suspended
        ]);

        if ($request->suspended == 'yes') {
            Mail::to($user->email)->send(new AdminSuspendUser($user));
        } elseif ($suspended && $request->suspended == 'no') {
            Mail::to($user->email)->send(new AdminUnSuspendUser($user));
        };

        return redirect()->back()->with('success', 'User Status Updated Successfully');
    }


    public function ViewNewsRequestsCategories()
    {
        return view('admin.news.news_categories');
    }

    public function In_ProcessNewsRequests()
    {
        $opinions_process = DB::table('opinions')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'opinions' as category"));

        $politics_process = DB::table('politics')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'politics' as category"));

        $business_process = DB::table('businesses')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'businesses' as category"));

        $styles_process = DB::table('styles')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'styles' as category"));

        $travel_process = DB::table('travel')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'travel' as category"));

        $sports_process = DB::table('sports')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'sports' as category"));

        $stories_process = DB::table('stories')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'stories' as category"));

        $tech_process = DB::table('technologies')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'technologies' as category"));

        $combinedQuery = $opinions_process
            ->unionAll($politics_process)
            ->unionAll($business_process)
            ->unionAll($styles_process)
            ->unionAll($travel_process)
            ->unionAll($sports_process)
            ->unionAll($stories_process)
            ->unionAll($tech_process);

        $newsRequests = DB::table(DB::raw("({$combinedQuery->toSql()}) as combined"))
            ->mergeBindings($combinedQuery)
            ->where('status', 'in_process')
            ->latest()
            ->paginate(20);

        $userIds = $newsRequests->pluck('user_id')->unique();

        $users = User::whereIn('id', $userIds)->get()->keyBy('id');

        $newsRequests->getCollection()->transform(function ($item) use ($users) {
            $item->user = $users[$item->user_id] ?? null;
            return $item;
        });

        return view('admin.news.in_process_news_requests', compact('newsRequests'));
    }


    public function AcceptedNewsRequests()
    {
        $opinions_process = DB::table('opinions')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'opinions' as category"));

        $politics_process = DB::table('politics')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'politics' as category"));

        $business_process = DB::table('businesses')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'businesses' as category"));

        $styles_process = DB::table('styles')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'styles' as category"));

        $travel_process = DB::table('travel')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'travel' as category"));

        $sports_process = DB::table('sports')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'sports' as category"));

        $stories_process = DB::table('stories')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'stories' as category"));

        $tech_process = DB::table('technologies')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'technologies' as category"));

        $combinedQuery = $opinions_process
            ->unionAll($politics_process)
            ->unionAll($business_process)
            ->unionAll($styles_process)
            ->unionAll($travel_process)
            ->unionAll($sports_process)
            ->unionAll($stories_process)
            ->unionAll($tech_process);

        $newsRequests = DB::table(DB::raw("({$combinedQuery->toSql()}) as combined"))
            ->mergeBindings($combinedQuery)
            ->where('status', 'accepted')
            ->latest()
            ->paginate(20);

        $userIds = $newsRequests->pluck('user_id')->unique();

        $users = User::whereIn('id', $userIds)->get()->keyBy('id');

        $newsRequests->getCollection()->transform(function ($item) use ($users) {
            $item->user = $users[$item->user_id] ?? null;
            return $item;
        });

        return view('admin.news.accepted_news_requests', compact('newsRequests'));
    }


    public function RejectedNewsRequests()
    {
        $opinions_process = DB::table('opinions')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'opinions' as category"));

        $politics_process = DB::table('politics')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'politics' as category"));

        $business_process = DB::table('businesses')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'businesses' as category"));

        $styles_process = DB::table('styles')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'styles' as category"));

        $travel_process = DB::table('travel')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'travel' as category"));

        $sports_process = DB::table('sports')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'sports' as category"));

        $stories_process = DB::table('stories')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'stories' as category"));

        $tech_process = DB::table('technologies')
            ->select('id', 'title', 'status', 'short_title', 'cover_image', 'user_id', 'created_at', DB::raw("'technologies' as category"));

        $combinedQuery = $opinions_process
            ->unionAll($politics_process)
            ->unionAll($business_process)
            ->unionAll($styles_process)
            ->unionAll($travel_process)
            ->unionAll($sports_process)
            ->unionAll($stories_process)
            ->unionAll($tech_process);

        $newsRequests = DB::table(DB::raw("({$combinedQuery->toSql()}) as combined"))
            ->mergeBindings($combinedQuery)
            ->where('status', 'rejected')
            ->latest()
            ->paginate(20);

        $userIds = $newsRequests->pluck('user_id')->unique();

        $users = User::whereIn('id', $userIds)->get()->keyBy('id');

        $newsRequests->getCollection()->transform(function ($item) use ($users) {
            $item->user = $users[$item->user_id] ?? null;
            return $item;
        });

        return view('admin.news.rejected_news_requests', compact('newsRequests'));
    }

    public function newsRequestDetails($category, $id)
    {
        $modelMap = [
            'opinions' => Opinion::class,
            'politics' => Politics::class,
            'businesses' => Business::class,
            'styles' => Style::class,
            'travel' => Travel::class,
            'sports' => Sport::class,
            'stories' => Story::class,
            'technologies' => Technology::class,
        ];

        if (!array_key_exists($category, $modelMap)) {
            return redirect()->back()->with('error', 'Invalid category!');
        }

        $model = $modelMap[$category];
        $requestDetails = $model::findOrFail($id);

        return view('admin.news.news_request_details', compact('requestDetails', 'category'));
    }


    public function changeTrustedUsers(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'trusted' => $request->trusted
        ]);

        if ($request->trusted == 'yes') {
            $user->notify(new TrustedUserNotification($user));
        } elseif ($request->trusted == 'no') {
            $user->notify(new UnTrustedUserNotification($user));
        }

        return redirect()->back();
    }

    public function manageUsers()
    {
        $users = User::latest()->paginate(15);
        return view('admin.manage_users', compact('users'));
    }

    public function manageContacts()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.manage_contacts', compact('contacts'));
    }

    public function contactDetails($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact_details', compact('contact'));
    }

    public function deleteContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully');
    }

    public function adsCreate()
    {
        return view('admin.ads.create_ads');
    }

    public function adsStore(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $allAdmins = Admin::all();
        $data = $request->all();
        $AdsIsActive = Ads::where('status', 'active')->first();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {
                $path = $file->store('/ads', ['disk' => 'public']);
            }
            $data['logo'] = $path;
        }

        if ($AdsIsActive && $data['status'] == 'active') {
            abort(redirect()->back()->with('error', 'There is already an active ad on the platform, change the status to inactive to create it..'));
        } else {
            $ads = $admin->ads()->create($data);
        }

        foreach ($allAdmins as $oneAdmin) {
            $oneAdmin->notify(new \App\Notifications\Admin\CreateAdsNotification($ads));
        }
        return redirect()->back()->with('success', 'Advertisement created successfully');
    }

    public function manageAds()
    {
        $allAds = Ads::latest()->paginate(12);
        return view('admin.ads.manage_ads', compact('allAds'));
    }

    public function adsChangeStatus(Request $request, $id)
    {
        $ads = Ads::findOrFail($id);
        $ads->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Successfully');
    }

    public function createQuickNews()
    {
        return view('admin.quick_news.create_quick_news');
    }

    public function storeQuickNews(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'short_title' => 'required|string|max:50000',
            'cover_image' => 'nullable|mimes:jpg,png,jpeg',
            'cover_image_description' => 'nullable|string|max:20000',
            'first_description' => 'required|string',
            'second_description' => 'nullable|string',
            'other_image' => 'nullable|mimes:jpg,png,jpeg,avif',
        ]);


        $user = Auth::guard('admin')->user();
        $admins = Admin::all();
        $data = $request->all();

        // Upload Cover Image | Quick News
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $opinions_cover_image_path = $file->store('/quick_news', [
                    'disk' => 'public'
                ]);
            }
            $data['cover_image'] = $opinions_cover_image_path;
        }

        // Upload Other Image | Quick News
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $quick_news_other_image_path = $file->store('/quick_news', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $quick_news_other_image_path;
        }

        $quick_news = $user->quick_news()->create($data);

        foreach ($admins as $admin) {
            $admin->notify(new \App\Notifications\Admin\QuickNewsNotification($quick_news));
        }

        return redirect()->back()->with('success', 'Quick news created successfully');
    }


    public function editQuickNews($id)
    {
        $quick_news = QuickNews::findOrFail($id);
        return view('admin.quick_news.edit_quick_news', compact('quick_news'));
    }

    public function updateQuickNews(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'short_title' => 'required|string|max:50000',
            'cover_image' => 'nullable|mimes:jpg,png,jpeg',
            'cover_image_description' => 'nullable|string|max:20000',
            'first_description' => 'required|string',
            'second_description' => 'nullable|string',
            'other_image' => 'nullable|mimes:jpg,png,jpeg,avif',
        ]);

        $data = $request->all();
        $quick_news = Auth::guard('admin')->user()->quick_news()->findOrFail($id);

        $old_image = $quick_news->cover_image;
        $other_image = $quick_news->other_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            if ($file->isValid()) {
                $path = $file->store('/quick_news', ['disk' => 'public']);
            }
            $data['cover_image'] = $path;
        }

        // Update Other Image | Quick News
        if ($request->hasFile('other_image')) {
            $file = $request->file('other_image');
            if ($file->isValid()) {
                $quick_news_other_image_path = $file->store('/quick_news', [
                    'disk' => 'public'
                ]);
            }
            $data['other_image'] = $quick_news_other_image_path;
        }


        $quick_news->update($data);

        if ($old_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_image);
        }

        if ($other_image && isset($data['other_image'])) {
            Storage::disk('public')->delete($other_image);
        }

        return redirect()->back()->with('success', 'Quick news updated successfully');
    }


    public function destroyQuickNews(string $id)
    {
        $user = Auth::guard('admin')->user();
        $quick_news = $user->quick_news()->findOrFail($id);

        // Delete cover image from storage
        if ($quick_news->cover_image) {
            Storage::disk('public')->delete($quick_news->cover_image);
        }

        // Delete other image from storage
        if ($quick_news->other_image) {
            Storage::disk('public')->delete($quick_news->other_image);
        }

        // Delete podcast from storage
        if ($quick_news->podcast) {
            Storage::disk('public')->delete($quick_news->podcast);
        }

        $quick_news->delete();
        return redirect()->back()->with('success', 'Quick news deleted successfully');
    }

    public function manageQuickNews()
    {
        $quickNewsRequests = QuickNews::latest()->paginate(20);

        return view('admin.quick_news.manage_quick_news', compact('quickNewsRequests'));
    }

    public function deleteAds($id)
    {
        $ads = Ads::findOrFail($id);
        $oldAvatar = $ads->avatar;

        if ($oldAvatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        $ads->delete();
        return redirect()->back()->with('success', 'Advertisement deleted successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $oldAvatar = $user->avatar;

        if ($oldAvatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        $user->delete();
        Mail::to($user->email)->send(new AdminDeleteUser($user));

        return redirect()->back()->with('success', 'User deleted successfully');
    }

    // Methods for Super Admin
    public function suspendAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $suspended = $request->suspended;

        $admin->update([
            'suspended' => $request->suspended
        ]);

        // if ($request->suspended == 'yes') {
        //     Mail::to($admin->email)->send(new AdminSuspendUser($admin));
        // } elseif ($suspended && $request->suspended == 'no') {
        //     Mail::to($admin->email)->send(new AdminUnSuspendUser($admin));
        // };

        return redirect()->back()->with('success', 'Admin Status Updated Successfully');
    }

    public function addSuperAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $suspended = $request->super_admin;

        $admin->update([
            'super_admin' => $request->super_admin
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin Status Updated Successfully');
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $oldAvatar = $admin->avatar;

        if ($oldAvatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        $admin->delete();
        //Mail::to($admin->email)->send(new AdminDeleteUser($admin));

        return redirect()->back()->with('success', 'Admin deleted successfully');
    }

    public function manageAdmins()
    {
        $admins = Admin::where('super_admin', '0')->latest()->paginate(15);
        return view('administrator.manage_admins', compact('admins'));
    }

    public function promote_admin_view($id)
    {
        $admin = Admin::findOrFail($id);

        return view('administrator.promote_admin', compact('admin'));
    }

    public function all_super_admins()
    {
        $super_admins = Admin::where('super_admin', '1')->latest()->paginate(10);
        return view('administrator.all_super_admins', compact('super_admins'));
    }

    public function searchOnUsers(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('admin.search.users', compact('users', 'query'));
    }
}
