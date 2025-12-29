<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | InternFolio</title>
    @vite('resources/css/app.css')
    <style>
        html {
            scroll-behavior: smooth;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        .pulse-slow {
            animation: pulse-slow 2s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50/30 to-gray-100 min-h-screen">

    <div class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="max-w-2xl mx-auto text-center">

            {{-- Animated 404 Illustration --}}
            <div class="relative mb-8">
                {{-- Background Decorations --}}
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-72 h-72 bg-blue-200/50 rounded-full blur-3xl"></div>
                </div>
                <div class="absolute top-10 left-1/4 w-4 h-4 bg-blue-400 rounded-full pulse-slow"></div>
                <div class="absolute top-20 right-1/4 w-3 h-3 bg-indigo-400 rounded-full pulse-slow"
                    style="animation-delay: 0.5s"></div>
                <div class="absolute bottom-20 left-1/3 w-2 h-2 bg-cyan-400 rounded-full pulse-slow"
                    style="animation-delay: 1s"></div>

                {{-- Main 404 Text --}}
                <div class="relative float-animation">
                    <h1
                        class="text-[180px] md:text-[220px] font-black text-transparent bg-clip-text bg-gradient-to-br from-blue-600 via-indigo-600 to-blue-700 leading-none select-none">
                        404
                    </h1>

                    {{-- Decorative Elements --}}
                    <div
                        class="absolute -top-4 -right-4 w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="relative z-10 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Oops! Halaman Tidak Ditemukan
                </h2>
                <p class="text-lg text-gray-600 max-w-md mx-auto leading-relaxed">
                    Sepertinya halaman yang Anda cari tidak ada atau sudah dipindahkan.
                    Jangan khawatir, mari kita kembali ke jalur yang benar!
                </p>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12">
                <a href="{{ route('dashboard.index') }}"
                    class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold text-lg rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Kembali ke Beranda
                </a>

                <button onclick="history.back()"
                    class="inline-flex items-center gap-3 px-8 py-4 bg-white text-gray-700 font-bold text-lg rounded-xl border-2 border-gray-200 hover:border-blue-300 hover:bg-gray-50 transition-all shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Halaman Sebelumnya
                </button>
            </div>

            {{-- Quick Links --}}
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-gray-100">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">
                    Atau coba kunjungi halaman ini
                </h3>
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="{{ route('intern.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 font-semibold rounded-lg hover:bg-blue-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Profil Alumni
                    </a>
                    <a href="{{ route('project.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-700 font-semibold rounded-lg hover:bg-indigo-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Proyek
                    </a>
                    <a href="{{ route('suggestion.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-50 text-cyan-700 font-semibold rounded-lg hover:bg-cyan-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        Tips & Saran
                    </a>
                </div>
            </div>

            {{-- Footer Note --}}
            <p class="mt-8 text-sm text-gray-400">
                Error Code: 404 | InternFolio
            </p>
        </div>
    </div>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>
