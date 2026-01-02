@props([
    'user_name',
    'position',
    'join_date' => null,
    'end_date' => null,
    'school',
    'major',
    'user_image' => null,
    'url' => '#',
])

<a href="{{ $url }}" class="block group">
    <div
        class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-5 border border-gray-100 dark:border-gray-700 group-hover:border-blue-300 dark:group-hover:border-blue-500">

        <div class="flex gap-4">

            {{-- Avatar --}}
            <div class="flex-shrink-0">
                @if ($user_image)
                    <img src="{{ asset('storage/' . $user_image) }}" alt="{{ $user_name }}"
                        class="w-20 h-20 rounded-xl object-cover shadow-sm ring-2 ring-blue-200 dark:ring-gray-600">
                @else
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-blue-100 to-blue-200 dark:from-gray-700 dark:to-gray-600 rounded-xl flex items-center justify-center 
                        text-blue-600 dark:text-blue-400 font-bold text-2xl shadow-sm ring-2 ring-blue-200 dark:ring-gray-600">
                        {{ strtoupper(substr($user_name, 0, 1)) }}
                    </div>
                @endif
            </div>

            {{-- Content --}}
            <div class="flex-1 min-w-0">

                {{-- Name --}}
                <h3
                    class="font-bold text-gray-900 dark:text-white text-lg truncate group-hover:text-blue-600 transition mb-1">
                    {{ $user_name }}
                </h3>

                {{-- Position --}}
                <p class="text-blue-600 font-semibold text-sm mb-2 truncate">
                    {{ $position }}
                </p>

                {{-- School & Major --}}
                <p class="text-sm text-gray-700 dark:text-gray-300 font-medium truncate">{{ $school }}</p>
                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ $major }}</p>

                {{-- Duration --}}
                @if ($join_date && $end_date)
                    <div class="flex items-center gap-1 mt-2 text-xs text-gray-400">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($join_date)->format('M Y') }} -
                        {{ \Carbon\Carbon::parse($end_date)->format('M Y') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</a>
