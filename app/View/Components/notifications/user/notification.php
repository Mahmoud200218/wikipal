<?php

namespace App\View\Components\notifications\user;

use App\Models\Front\Contact;
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
    public $notificationsCount;
    public function __construct($count = 9)
    {
        $user = Auth::user();
        $this->notifications = $user->unReadNotifications()->take($count)->get();
        $this->notificationsCount = $user->unReadNotifications()->take($count)->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notifications.user.notification');
    }
}
