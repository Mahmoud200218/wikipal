<?php

namespace App\View\Components\notifications;

use App\Models\Front\Contact;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class notification extends Component
{
    /**
     * Create a new component instance.
     */
    public $notifications;
    public $contactCount;
    public $contacts;

    public function __construct($count = 9)
    {
        $admin = Auth::guard('admin')->user();
        $this->notifications = $admin->unReadNotifications()->take($count)->get();
        $this->contactCount = $admin->unReadNotifications()->count();

        $this->contacts = Contact::with('user')->get();

        foreach ($this->contacts as $contact) {
            return $contact;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notifications.notification');
    }
}
