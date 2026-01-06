<x-layouts.app
    bodyClass="bg-gradient-to-br from-gray-50 via-blue-50/20 to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="max-w-7xl mx-auto px-6 py-8">

        {{-- Breadcrumb & Share --}}
        <div class="flex items-center justify-between mb-6">
            <nav class="flex items-center gap-2 text-sm" aria-label="Breadcrumb">
                <a href="{{ route('dashboard.index') }}"
                    class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
                <a href="{{ route('intern.index') }}"
                    class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition">
                    Profil Alumni
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-gray-900 dark:text-white font-medium">{{ $intern['user_name'] }}</span>
            </nav>

            {{-- Share Button --}}
            <x-share-button :shortLink="$shortLink" :title="$intern['user_name']" :description="$intern['position']" color="blue" />
        </div>

        {{-- Back Button --}}
        <a href="{{ route('intern.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 text-sm bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg
                  text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-blue-300 dark:hover:border-blue-500 transition-all group shadow-sm mb-6">
            <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke Profil Alumni
        </a>

        {{-- Header Card Enhanced --}}
        <div
            class="bg-gradient-to-r from-white to-blue-50/50 dark:from-gray-800 dark:to-gray-800/50 rounded-2xl shadow-lg p-8 mb-8 hover:shadow-xl transition-shadow border border-blue-100 dark:border-gray-700">
            <div class="flex flex-col md:flex-row gap-6 items-start md:items-center">
                {{-- Profile Image with Gradient Ring --}}
                <div class="relative">
                    <div class="p-1 bg-gradient-to-br from-blue-400 via-blue-600 to-indigo-600 rounded-2xl">
                        @if ($intern['user_image'])
                            <img src="{{ asset('storage/' . $intern['user_image']) }}"
                                class="w-32 h-32 rounded-xl object-cover ring-4 ring-white dark:ring-gray-700"
                                alt="{{ $intern['user_name'] }}">
                        @else
                            <div
                                class="w-32 h-32 bg-gradient-to-br from-blue-100 to-blue-200 dark:from-gray-700 dark:to-gray-600 rounded-xl flex items-center justify-center text-blue-600 dark:text-blue-400 font-bold text-5xl ring-4 ring-white dark:ring-gray-700">
                                {{ strtoupper(substr($intern['user_name'], 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div
                        class="absolute -bottom-2 -right-2 bg-indigo-500 w-8 h-8 rounded-full border-4 border-white flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="flex-1">
                    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-2">{{ $intern['user_name'] }}
                    </h1>
                    <p class="text-xl text-blue-600 font-semibold mb-4">{{ $intern['position'] }}</p>

                    {{-- Testimonial/Rating Section --}}
                    <div
                        class="bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-gray-700 dark:to-gray-700 rounded-xl p-4 border border-amber-200 dark:border-amber-800/30 mb-6">
                        <div class="flex items-center gap-3 mb-3">
                            <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                            <span class="text-sm font-semibold text-amber-700 dark:text-amber-300">Testimoni Pengalaman
                                Magang</span>
                        </div>
                        {{-- Rating Stars --}}
                        <div class="flex items-center gap-2 mb-3">
                            <div class="flex items-center gap-0.5">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-6 h-6 {{ $i <= $intern['rating']['rating_range'] ? 'text-amber-400' : 'text-gray-300 dark:text-gray-500' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46 1.287 3.97c.3.921-.755 1.688-1.54 1.118L10 13.348l-3.365 2.427c-.784.57-1.838-.197-1.539-1.118l1.286-3.97-3.385-2.46c-.783-.57-.38-1.81.588-1.81h4.178l1.286-3.97z" />
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-sm font-bold text-amber-700 dark:text-amber-300">
                                {{ $intern['rating']['rating_range'] }}/5
                            </span>
                        </div>
                        {{-- Description --}}
                        @if ($intern['rating']['rating_description'])
                            <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed italic">
                                "{{ $intern['rating']['rating_description'] }}"
                            </p>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-sm italic">
                                Belum ada deskripsi pengalaman.
                            </p>
                        @endif
                    </div>

                    {{-- Enhanced Social Links --}}
                    <div class="flex flex-wrap gap-3">
                        @if ($intern['linkedin_url'])
                            <a href="{{ $intern['linkedin_url'] }}" target="_blank"
                                class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                                LinkedIn
                            </a>
                        @endif
                        @if ($intern['instagram_url'])
                            <a href="{{ $intern['instagram_url'] }}" target="_blank"
                                class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold bg-gradient-to-r from-pink-500 to-pink-600 text-white rounded-lg hover:from-pink-600 hover:to-pink-700 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                                Instagram
                            </a>
                        @endif
                        @if ($intern['github_url'])
                            <a href="{{ $intern['github_url'] }}" target="_blank"
                                class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold bg-gradient-to-r from-gray-700 to-gray-800 text-white rounded-lg hover:from-gray-800 hover:to-gray-900 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                </svg>
                                GitHub
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT COLUMN --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Academic Background --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-shadow">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Latar Belakang Akademik</h2>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Pendidikan formal</p>
                        </div>
                    </div>

                    <div
                        class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-700 rounded-xl p-6 border border-blue-200 dark:border-gray-600">
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Institusi</p>
                                <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $intern['school'] }}</p>
                            </div>
                            @if (!empty($intern['major']))
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Program Studi</p>
                                    <p class="text-lg font-semibold text-blue-700 dark:text-blue-400">
                                        {{ $intern['major'] }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Proyek Section --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-indigo-100 rounded-lg">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Proyek yang Dikerjakan</h2>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Karya selama magang</p>
                            </div>
                        </div>
                        @if (count($intern['projects']) > 0)
                            <span class="bg-indigo-100 text-indigo-700 text-sm font-bold px-4 py-2 rounded-lg">
                                {{ count($intern['projects']) }} Proyek
                            </span>
                        @endif
                    </div>

                    @if (count($intern['projects']) > 0)
                        <div
                            class="space-y-4 {{ count($intern['projects']) > 2 ? 'max-h-[220px] overflow-y-auto pr-2' : '' }}">
                            @foreach ($intern['projects'] as $project)
                                <a href="{{ route('project.show', $project['project_uuid']) }}"
                                    class="block p-5 border-2 border-gray-100 dark:border-gray-700 rounded-xl hover:border-indigo-300 dark:hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 hover:shadow-md transition-all group">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="flex-1 min-w-0">
                                            <h3
                                                class="font-bold text-gray-900 dark:text-white group-hover:text-indigo-700 dark:group-hover:text-indigo-400 mb-2 transition-colors">
                                                {{ $project['project_title'] }}
                                            </h3>
                                            <p
                                                class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-2 break-words overflow-wrap-anywhere">
                                                {{ $project['project_description'] }}
                                            </p>
                                        </div>
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 transition-colors flex-shrink-0 mt-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        {{-- Empty State for Proyek --}}
                        <div class="flex flex-col items-center justify-center py-12 px-6">
                            <div class="relative mb-6">
                                <div class="absolute inset-0 bg-indigo-100 rounded-full blur-xl opacity-50"></div>
                                <div class="relative p-6 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-full">
                                    <svg class="w-16 h-16 text-indigo-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Belum Ada Proyek</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 text-center max-w-md">
                                Alumni ini belum menambahkan proyek yang dikerjakan selama masa magang.
                            </p>
                        </div>
                    @endif
                </div>

                {{-- Suggestions Section --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-cyan-100 rounded-lg">
                                <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tips & Saran</h2>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Kontribusi knowledge</p>
                            </div>
                        </div>
                        @if (count($intern['suggestions']) > 0)
                            <span class="bg-cyan-100 text-cyan-700 text-sm font-bold px-4 py-2 rounded-lg">
                                {{ count($intern['suggestions']) }} Tips
                            </span>
                        @endif
                    </div>

                    @if (count($intern['suggestions']) > 0)
                        <div
                            class="space-y-3 {{ count($intern['suggestions']) > 3 ? 'max-h-[215px] overflow-y-auto pr-2' : '' }}">
                            @foreach ($intern['suggestions'] as $suggestion)
                                <a href="{{ route('suggestion.show', $suggestion['suggestion_uuid']) }}"
                                    class="block p-4 border-2 border-gray-100 dark:border-gray-700 rounded-xl hover:border-cyan-300 dark:hover:border-cyan-500 hover:bg-cyan-50 dark:hover:bg-cyan-900/20 hover:shadow-md transition-all group">
                                    <div class="flex items-start justify-between gap-3">
                                        <h3
                                            class="font-semibold text-gray-900 dark:text-white group-hover:text-cyan-700 dark:group-hover:text-cyan-400 transition-colors flex-1 line-clamp-2">
                                            {{ $suggestion['suggestion_title'] }}
                                        </h3>
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-cyan-600 transition-colors flex-shrink-0 mt-0.5"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        {{-- Empty State for Suggestions --}}
                        <div class="flex flex-col items-center justify-center py-12 px-6">
                            <div class="relative mb-6">
                                <div class="absolute inset-0 bg-cyan-100 rounded-full blur-xl opacity-50"></div>
                                <div class="relative p-6 bg-gradient-to-br from-cyan-50 to-cyan-100 rounded-full">
                                    <svg class="w-16 h-16 text-cyan-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Belum Ada Tips & Saran
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 text-center max-w-md">
                                Alumni ini belum membagikan tips atau saran untuk junior magang.
                            </p>
                        </div>
                    @endif
                </div>

            </div>

            {{-- RIGHT COLUMN --}}
            <div class="space-y-6">

                {{-- Internship Info --}}
                <div
                    class="bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-50 dark:from-gray-800 dark:via-gray-800 dark:to-gray-800 rounded-2xl shadow-lg p-6 border-2 border-blue-200/50 dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 dark:text-white">Info Magang</h3>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Detail magang</p>
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-gray-700 rounded-xl p-5 shadow-sm border border-blue-100 dark:border-gray-600 space-y-4">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Departemen</p>
                            <p class="font-semibold text-gray-900 dark:text-white">
                                {{ $intern['department']['department_name'] }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Periode</p>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ \Carbon\Carbon::parse($intern['join_date'])->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($intern['end_date'])->format('d M Y') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Durasi</p>
                            @php
                                $start = \Carbon\Carbon::parse($intern['join_date']);
                                $end = \Carbon\Carbon::parse($intern['end_date']);
                                $totalDays = $start->diffInDays($end);
                                $months = floor($totalDays / 30); // Bulatkan ke bawah untuk bulan
                                $remainingDays = $totalDays - $months * 30; // Sisa hari
                            @endphp
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ $months }}
                                Bulan{{ $remainingDays > 0 ? ' ' . $remainingDays . ' Hari' : '' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Statistics --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="p-2 bg-indigo-100 rounded-lg">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 dark:text-white">Statistik</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Kontribusi</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div
                            class="flex items-center justify-between p-4 bg-indigo-50 dark:bg-indigo-900/30 rounded-lg border border-indigo-200 dark:border-indigo-800">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Total Proyek</span>
                            <span
                                class="text-2xl font-bold text-indigo-600">{{ count($intern['projects'] ?? []) }}</span>
                        </div>
                        <div
                            class="flex items-center justify-between p-4 bg-cyan-50 dark:bg-cyan-900/30 rounded-lg border border-cyan-200 dark:border-cyan-800">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Total Tips</span>
                            <span
                                class="text-2xl font-bold text-cyan-600">{{ count($intern['suggestions'] ?? []) }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-layouts.app>
