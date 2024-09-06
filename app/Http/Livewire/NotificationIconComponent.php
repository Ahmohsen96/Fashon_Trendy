<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationIconComponent extends Component
{
    public $notifications;
    public $unreadCount;

    protected $listeners = [
        'refreshComponent' => '$refresh', // For manual refresh
        'notificationReceived' => 'fetchNotifications'];

    public function mount()
    {
        $this->fetchNotifications();
    }

    public function fetchNotifications()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $this->notifications = $user->unreadNotifications->take(5); // Limit to 5 most recent
            $this->unreadCount = $user->unreadNotifications->count();
        } else {
            $this->notifications = collect(); // Empty collection
            $this->unreadCount = 0;
        }
    }

    public function markAsRead($notificationId)
    {
        if (Auth::check()) {
            $notification = Auth::user()->notifications()->find($notificationId);
            if ($notification) {
                $notification->markAsRead();
                $this->fetchNotifications();
            }
        }
    }

    public function render()
    {
        return view('livewire.notification-icon-component');
    }
}
