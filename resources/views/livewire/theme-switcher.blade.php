
 <div class="theme-switcher">
    <!-- Modern Toggle Switch -->
    <label class="switch">
        <input type="checkbox" wire:click="toggleTheme" @if($theme === 'dark') checked @endif>
        <span class="slider round"></span>
    </label>
</div>



<!-- JavaScript to handle the theme switching -->
<script>
    document.addEventListener('livewire:load', function () {
        // Apply the stored theme on page load
        let storedTheme = localStorage.getItem('theme') || 'light';
        document.body.classList.add(storedTheme + '-theme');

        // Listen for theme changes from Livewire
        Livewire.on('themeChanged', (theme) => {
            document.body.classList.remove('light-theme', 'dark-theme');
            document.body.classList.add(theme + '-theme');

            // Store the theme in localStorage
            localStorage.setItem('theme', theme);
        });
    });
</script>

<!-- CSS for the themes and toggle switch -->
<style>
    /* Light Theme Styles */
    body.light-theme {
        background-color: #fff;
        color: #000;
    }

    /* Dark Theme Styles */
    body.dark-theme {
        background-color: #aab7b8;
        color: #fff;
    }

    /* Toggle Switch Styles */
    .theme-switcher {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        border-radius: 50%;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #4caf50;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
