<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThemeSwitcher extends Component
{
    public $theme = 'light'; // Default theme

    // Method to toggle the theme
    public function toggleTheme()
    {
        // Toggle between light and dark themes
        $this->theme = $this->theme === 'light' ? 'dark' : 'light';
        session()->put('theme', $this->theme);

        // Emit the theme change event to the frontend
        $this->emit('themeChanged', $this->theme);
    }

    // Persist theme on mount
    public function mount()
    {
        // You can also check for a user-specific theme from the database if needed
        $this->theme = session()->get('theme', 'light');
    }

    public function render()
    {
        return view('livewire.theme-switcher');
    }
}
