import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Echo.private(`App.Models.User.${userId}`)
    .notification((notification) => {
        alert(notification.message);
        // Or update the notification area in the UI
    });

    import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo.channel('notifications')
    .listen('NotificationSent', (event) => {
        Livewire.emit('notificationReceived');
    });


    


