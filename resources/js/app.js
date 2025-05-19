import './bootstrap';

      
    // Immediately apply dark mode on page load (even before Alpine/Livewire)
    if (localStorage.getItem('dark') === 'true') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // Expose a global toggle function for your toggle switch
    window.toggleDarkMode = function (val) {
        localStorage.setItem('dark', val);
        document.documentElement.classList.toggle('dark', val);
    };

    document.addEventListener('livewire:navigated', () => {
        // Restore dark class manually if lost after Livewire navigation
        if (localStorage.getItem('dark') === 'true') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });

