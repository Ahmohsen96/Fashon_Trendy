<div class="header-action-icon-2">
    <a href="#">
        <img class="svgInject" alt="Notifications" src="{{ asset('assets/imgs/theme/icons/icon-bell-alert.svg') }}">
        <span class="pro-count blue">{{ $unreadCount }}</span>
    </a>
    <div class="notification-dropdown">
        <div class="dropdown-header">
            <span class="title">Notifications</span>
            <button class="mark-all-read">Mark All Read</button>
        </div>
        <ul class="notification-list">
            @forelse($this->notifications as $notification)
                <li class="notification-item">
                    <a href="#" wire:click.prevent="markAsRead('{{ $notification->id }}')">
                        <div class="icon-container">
                            <i class="icon {{ $notification->data['icon'] ?? 'fa fa-info-circle' }}"></i>
                        </div>
                        <div class="content">
                            <p class="message">{{ $notification->data['message'] ?? 'New Notification' }}</p>
                            <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                    </a>
                </li>
            @empty
                <li class="notification-item">No new notifications</li>
            @endforelse
        </ul>
        <div class="dropdown-footer">
            <a href="#" class="view-all">VIEW ALL</a>
        </div>
    </div>
</div>
<style>
.header-action-icon-2 {
    position: relative;
}

.pro-count {
    position: absolute;
    top: -5px;
    right: -10px;
    background-color: blue;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 12px;
}

.notification-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    width: 300px;
    border-radius: 8px;
    z-index: 1000;
    overflow: hidden;
}

.header-action-icon-2:hover .notification-dropdown {
    display: block;
}

.dropdown-header {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background-color: #007bff;
    color: white;
}

.dropdown-header .title {
    font-weight: bold;
}

.dropdown-header .mark-all-read {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
}

.notification-list {
    list-style: none;
    padding: 0;
    margin: 0;
    max-height: 300px;
    overflow-y: auto;
}

.notification-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #e9ecef;
}

.notification-item .icon-container {
    flex-shrink: 0;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    border-radius: 50%;
    margin-right: 10px;
}

.notification-item .icon {
    font-size: 20px;
    color: #007bff;
}

.notification-item .content {
    flex-grow: 1;
}

.notification-item .message {
    font-weight: bold;
    margin: 0;
}

.notification-item .time {
    color: #6c757d;
    font-size: 12px;
}

.dropdown-footer {
    padding: 10px;
    text-align: center;
    background-color: #f8f9fa;
}

.dropdown-footer .view-all {
    color: #007bff;
    text-decoration: none;
}
</style>

<script>
    document.querySelector('.header-action-icon-2 > a').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.notification-dropdown').classList.toggle('show');
    });

    document.addEventListener('click', function(e) {
        if (!document.querySelector('.header-action-icon-2').contains(e.target)) {
            document.querySelector('.notification-dropdown').classList.remove('show');
        }
    });
</script>

<style>
    .notification-dropdown.show {
        display: block;
    }
</style>
