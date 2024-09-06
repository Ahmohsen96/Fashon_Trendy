<div>
    <form wire:submit.prevent="generateResponse">
        <textarea wire:model="prompt" rows="4" placeholder="Enter your prompt here..." class="w-full p-2"></textarea>
        <button type="submit" class="mt-2 p-2 bg-blue-500 text-white">Submit</button>
    </form>

    @if ($response)
        <div class="mt-4 p-4 bg-gray-100">
            <strong>Response:</strong>
            <p>{{ $response }}</p>
        </div>
    @endif
</div>

