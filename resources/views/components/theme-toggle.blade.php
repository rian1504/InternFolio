@props(['class' => ''])

<div x-data="{
    theme: localStorage.getItem('theme') || 'light',
    init() {
        this.applyTheme();
        this.$watch('theme', () => this.applyTheme());
    },
    applyTheme() {
        if (this.theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        localStorage.setItem('theme', this.theme);
    },
    toggle() {
        this.theme = this.theme === 'light' ? 'dark' : 'light';
    }
}" {{ $attributes->merge(['class' => $class]) }}>
    <button @click="toggle()"
        class="relative p-2 rounded-lg transition-all duration-300 
               bg-gray-100 dark:bg-gray-700/50 
               hover:bg-gray-200 dark:hover:bg-gray-600/50
               border border-gray-200 dark:border-gray-600
               group"
        :title="theme === 'light' ? 'Aktifkan Mode Gelap' : 'Aktifkan Mode Terang'">
        {{-- Sun Icon (Light Mode) --}}
        <svg x-show="theme === 'light'" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 rotate-90 scale-0" x-transition:enter-end="opacity-100 rotate-0 scale-100"
            class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                clip-rule="evenodd" />
        </svg>

        {{-- Moon Icon (Dark Mode) --}}
        <svg x-show="theme === 'dark'" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -rotate-90 scale-0"
            x-transition:enter-end="opacity-100 rotate-0 scale-100" class="w-5 h-5 text-indigo-400" fill="currentColor"
            viewBox="0 0 20 20">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
        </svg>
    </button>
</div>
