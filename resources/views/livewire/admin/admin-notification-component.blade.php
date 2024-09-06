<div>
    <h2>Send Notification</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif



    <form wire:submit.prevent="sendNotification">
        <div class="form-group">
            <label for="user_id">Select User:</label>
            <select wire:model="user_id" id="user_id" class="form-control" {{ $send_to_all ? 'disabled' : '' }}>
                <option value="">Choose User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea wire:model="message" id="message" class="form-control"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-check">
            <input wire:model="send_to_all" class="form-check-input" type="checkbox" id="send_to_all">
            <label class="form-check-label" for="send_to_all">
                Send to all users
            </label>
        </div>

        <button type="submit" class="btn btn-primary" wire:listen='notificationSent' wire:click="$emit('refreshComponent')">Send Notification</button>

        @if($successMessage)
            <div class="mt-3 alert alert-success">
                {{ $successMessage }}
            </div>
        @endif
    </form>



</div>

{{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('3c6e097681e91b35515d', {
    cluster: 'mt1'
  });

  var channel = pusher.subscribe('notifications');
  channel.bind('NotificationSent', function(data) {
    alert(JSON.stringify(data));
  });
</script> --}}

{{--............--}}

{{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('3c6e097681e91b35515d', {
    cluster: 'mt1'
  });

  var channel = pusher.subscribe('notifications');
  channel.bind('NotificationSent', function(data) {
    // Use SweetAlert2 for modern notification UI
    Swal.fire({
      title: 'New Notification',
      text: data.message,  // Assuming `message` is a key in the received data
      icon: 'info',
      confirmButtonText: 'OK'
    });
  });
</script> --}}





