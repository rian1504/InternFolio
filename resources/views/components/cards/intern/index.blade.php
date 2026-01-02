@props([
    'user_name',
    'position',
    'join_date' => null,
    'end_date' => null,
    'school',
    'major',
    'instagram_url' => null,
    'linkedin_url' => null,
    'github_url' => null,
    'user_image' => null,
    'url' => '#',
])

<a href="{{ $url }}" class="block group h-full">
    <div
        class="h-full p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 
                border border-gray-100 dark:border-gray-700 group-hover:border-blue-300 dark:group-hover:border-blue-500 transform group-hover:-translate-y-2">

        <div class="flex flex-col items-center text-center">

            {{-- Avatar dengan Gradient Ring --}}
            <div class="relative mb-4">
                @if ($user_image)
                    <div
                        class="p-1 bg-gradient-to-br from-blue-400 via-blue-600 to-indigo-600 rounded-full transform group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('storage/' . $user_image) }}" alt="{{ $user_name }}"
                            class="w-24 h-24 rounded-full object-cover ring-4 ring-white dark:ring-gray-700">
                    </div>
                @else
                    <div
                        class="p-1 bg-gradient-to-br from-blue-400 via-blue-600 to-indigo-600 rounded-full transform group-hover:scale-110 transition-transform duration-300">
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 dark:from-gray-700 dark:to-gray-600 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 font-bold text-3xl ring-4 ring-white dark:ring-gray-700">
                            {{ strtoupper(substr($user_name, 0, 1)) }}
                        </div>
                    </div>
                @endif
            </div>

            {{-- Name --}}
            <h3
                class="font-bold text-gray-900 dark:text-white text-xl mb-1 group-hover:text-blue-600 transition-colors">
                {{ $user_name }}
            </h3>

            {{-- Position --}}
            <p class="text-blue-600 font-semibold text-sm mb-3">
                {{ $position }}
            </p>

            {{-- Duration Badge --}}
            @if ($join_date && $end_date)
                <div
                    class="flex items-center gap-1.5 text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-3 py-1.5 rounded-full mb-4">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ \Carbon\Carbon::parse($join_date)->format('M Y') }} -
                    {{ \Carbon\Carbon::parse($end_date)->format('M Y') }}
                </div>
            @endif

            {{-- School & Major --}}
            <div
                class="w-full bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-700 rounded-lg p-4 border border-blue-100 dark:border-gray-600">
                <p class="text-sm font-bold text-gray-800 dark:text-white mb-1">{{ $school }}</p>
                <p class="text-xs text-gray-600 dark:text-gray-400">{{ $major }}</p>
            </div>

        </div>
    </div>
</a>
