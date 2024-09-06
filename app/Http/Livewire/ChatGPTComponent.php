<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\OpenAIService;

class ChatGPTComponent extends Component
{
    public $prompt;
    public $response;

    // Remove the dependency injection from the mount method
    protected $openAIService;

    // Initialize the service manually in the constructor
    public function mount()
    {
        $this->openAIService = new OpenAIService();
    }

    public function generateResponse()
    {
        $this->validate([
            'prompt' => 'required|string|min:5',
        ]);

        // Ensure the service is initialized before using it
        if ($this->openAIService) {
            $this->response = $this->openAIService->generateText($this->prompt);
        } else {
            $this->response = "Failed to connect to the AI service.";
        }
    }

    public function render()
    {
        return view('livewire.chat-g-p-t-component');
    }
}
