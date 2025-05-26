<x-app-layout>
    <x-slot name="header" class="bg-[var(--dark-bg)]">
        <div class="flex items-center justify-between ">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('logo.png') }}" alt="Company Logo" class="w-12 h-12">
                <h1 class="text-2xl font-bold text-[var(--dark-text)]">ClickSync Dashboard</h1>
            </div>

        </div>
    </x-slot>

    <div class="min-h-screen bg-[var(--dark-bg)]">
        <main class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-stretch">
                <!-- Click Section -->
                <div class="bg-[var(--dark-bg)] rounded-2xl p-8 shadow-xl">
                    <h2 class="text-2xl font-bold text-[var(--dark-text)] mb-6">Synchronized Click</h2>
                    <button
                        onclick="handleClick()"
                        class="w-full py-4 bg-[var(--accent)] hover:bg-[#8a12d3] text-white font-bold rounded-xl transition-[var(--transition-standard)] transform hover:scale-[1.02] active:scale-95 flex items-center justify-center space-x-2"
                        id="clickButton"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span>Activate Sync</span>
                        <svg id="syncLoader" class="w-5 h-5 animate-spin hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l5-5-5-5v4a8 8 0 100 16z" />
                        </svg>
                    </button>
                </div>

                <!-- Status Panel -->
                <div class="bg-white rounded-2xl p-8 shadow-xl bg-[var(--dark-bg)]">
                    <h2 class="text-2xl font-bold text-[var(--dark-text)] mb-6">Sync Status</h2>
                    <div id="response" class="space-y-6">
                        <div class="flex items-center justify-between p-4  bg-[var(--accent)]  rounded-2xl p-8 shadow-xl rounded-lg">
                            <div class="space-y-1">
                                <h3 class="text-lg font-semibold text-[var(--light-text)]">Current Session</h3>
                                <p class="text-sm text-[var(--grey-dark)]" id="sessionTimer">Active for next 10 seconds</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-[var(--accent)]/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-[var(--accent)]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 \">
                            <div class="p-4  bg-[var(--accent)]  rounded-lg text-center">
                                <p class="text-sm text-[var(--grey-dark)]">Total Users</p>
                                <p class="text-2xl font-bold text-[var(--light-text)]" id="totalUsers">0</p>
                            </div>
                            <div class="p-4  bg-[var(--accent)]  rounded-lg text-center">
                                <p class="text-sm text-[var(--grey-dark)]">Active Now</p>
                                <p class="text-2xl font-bold text-[var(--light-text)]" id="activeUsers">0</p>
                            </div>
                        </div>

                        <div class="p-4  bg-[var(--accent)]  rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-[var(--grey-dark)]">Sync Progress</span>
                                <span class="text-sm font-semibold text-[var(--accent)]" id="progressText">0%</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div id="progressBar" class="h-full bg-[var(--accent)] transition-[var(--transition-smooth)] rounded-full" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function handleClick() {
            const btn = document.getElementById('clickButton');
            const loader = document.getElementById('syncLoader');

            btn.disabled = true;
            loader.classList.remove('hidden');

            fetch('/click', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    updateUI(data);
                    btn.disabled = false;
                    loader.classList.add('hidden');
                });
        }

        function updateUI(data) {
            const progress = (data.clicked_users_count / data.total_users) * 100;
            document.getElementById('progressBar').style.width = `${progress}%`;
            document.getElementById('progressText').textContent = `${Math.round(progress)}%`;

            document.getElementById('totalUsers').textContent = data.total_users;
            document.getElementById('activeUsers').textContent = data.clicked_users_count;

            if (data.all_clicked) {
                const btn = document.getElementById('clickButton');
                btn.classList.add('animate-pulse');
                setTimeout(() => btn.classList.remove('animate-pulse'), 2000);
            }
        }

        fetch('/click')
            .then(response => response.json())
            .then(data => updateUI(data));
    </script>

    <style>
        :root {
            --light-bg: #f9fafb;
            --dark-bg: #0f172a;
            --accent: #9333ea;
            --light-text: #e2e8f0;
            --dark-text: #f1f5f9;
            --grey-dark: #94a3b8;
            --transition-standard: all 0.3s ease;
            --transition-smooth: width 0.5s ease-in-out;
            --scrollbar-track: #1e293b;
            --scrollbar-thumb: #4c1d95;
            --scrollbar-thumb-hover: #6b21a8;
        }

        html, body {
            background: var(--dark-bg);
            color: var(--dark-text);
        }

        ::-webkit-scrollbar {
            width: 8px;
            background: var(--scrollbar-track);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--scrollbar-thumb);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--scrollbar-thumb-hover);
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        .animate-pulse {
            animation: pulse 1.5s ease-in-out infinite;
        }
    </style>
</x-app-layout>
