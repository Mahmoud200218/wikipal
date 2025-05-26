<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Front\Contact;
use App\Notifications\Admin\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactRequestNotification;


class ContactController extends Controller
{
    public function contact()
    {
        return view('front.contact.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required'],
            'subject' => ['required', 'max:255'],
            'message' => ['required']
        ]);

        $admins = Admin::all();
        $user = Auth::user();
        $data = $request->all();

        $contact = $user->contacts()->create($data);

        foreach ($admins as $admin) {
            // Notify the admin via database notification
            $admin->notify(new ContactNotification($contact));

            // Send an email notification to the admin
            Mail::to($admin->email)->send(new ContactRequestNotification($contact));
        }

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully.');
    }
}
