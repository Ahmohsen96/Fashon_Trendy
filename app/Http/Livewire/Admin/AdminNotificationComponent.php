<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\NotificationSent;


class AdminNotificationComponent extends Component
{
    public $user_id;
    public $message;
    public $send_to_all = false; // Add this property for the checkbox
    public $successMessage = ''; // Add this property for the success message

    public $users;

    public function mount()
    {
        $this->users = User::all(); // Get all users for the dropdown

    }



    public function sendNotification()
{
    $this->validate([
        'message' => 'required|string',
        'user_id' => 'nullable|exists:users,id',
    ]);

    if ($this->send_to_all) {
        // Send notification to all users
        $users = User::all();
        Notification::send($users, new AdminNotification($this->message));


        // Broadcast the notification event
        event(new NotificationSent($this->message));

        $this->successMessage = 'Notification sent to all users successfully!';
    } else {
        // Send notification to the selected user
        if ($this->user_id) {
            $user = User::find($this->user_id);
            if ($user) {



                $user->notify(new AdminNotification($this->message));

                // Broadcast the notification event
                event(new NotificationSent($this->message));
                // event(new NotificationSent($this->message));


                $this->successMessage = 'Notification sent to the user successfully!';
            }
        }
    }

    // Clear fields and refresh notifications
    $this->reset(['user_id', 'message', 'send_to_all']);

    $this->emit('notificationReceived');
    $this->emitTo('notification-icon-component','refreshComponent');



}


    public function render()
    {
        return view('livewire.admin.admin-notification-component');
    }
}
