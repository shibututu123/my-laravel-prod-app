<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-base-200">

<div class="flex min-h-screen">

    <!-- Mobile top bar -->
    <div class="lg:hidden fixed top-0 left-0 right-0 z-20 bg-white shadow-md flex items-center justify-between px-4 py-3">
        <span class="font-bold text-lg">{{ config('app.name') }}</span>
        <button onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')"
            class="btn btn-ghost btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Sidebar overlay (mobile) -->
    <div onclick="document.getElementById('sidebar').classList.add('-translate-x-full')"
        class="lg:hidden fixed inset-0 bg-black/30 z-10 hidden" id="overlay"></div>

    <!-- ===== SIDEBAR ===== -->
    <aside id="sidebar"
        class="fixed top-0 left-0 h-full w-52 bg-white flex flex-col justify-between py-6 px-3 shadow-md z-20
               transform -translate-x-full lg:translate-x-0 transition-transform duration-200">
        <div>
            <!-- User -->
            <div class="flex items-center gap-2 px-2 mb-8 mt-2">
                <div class="avatar placeholder">
                    <div class="bg-indigo-100 text-indigo-600 rounded-full w-10">
                        <span class="text-sm font-bold">
                            {{ Auth::check() ? strtoupper(substr(Auth::user()->name, 0, 1)) : 'G' }}
                        </span>
                    </div>
                </div>
                <span class="font-semibold text-sm truncate">
                    {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                </span>
                @auth
                <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                    @csrf
                    <button type="submit" class="text-red-400 hover:text-red-600" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                        </svg>
                    </button>
                </form>
                @endauth
            </div>

            <!-- Nav -->
            <ul class="menu w-full p-0 gap-1">
                <li>
                    <a href="{{ url('/home') }}"
                        class="{{ request()->is('home') ? 'bg-indigo-500 text-white hover:bg-indigo-600' : 'hover:bg-base-200' }} rounded-lg font-semibold">
                        Job Orders
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="{{ request()->is('casual-pool') ? 'bg-indigo-500 text-white hover:bg-indigo-600' : 'hover:bg-base-200' }} rounded-lg">
                        Casual Pool
                    </a>
                </li>
            </ul>
        </div>

        <!-- Logo -->
        <div class="flex items-center gap-2 px-2">
            <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <span class="font-bold text-sm">Agentic Ai</span>
        </div>
    </aside>

    <!-- ===== MAIN AREA ===== -->
    <div class="lg:ml-52 flex-1 flex flex-col w-full">

        <!-- Header -->
        <header class="bg-white shadow-sm px-6 py-3 sticky top-0 z-10 mt-14 lg:mt-0">
            <select class="select select-bordered w-full max-w-xl bg-base-100 text-sm">
                <option>Action Workforce - NSW - AP</option>
                <option>Action Workforce - VIC - AP</option>
                <option>Action Workforce - QLD - AP</option>
            </select>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-4 sm:p-8">
            @yield('content')
        </main>

    </div>
</div>

<!-- Mobile sidebar toggle script -->
<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    document.querySelector('button[onclick]')?.addEventListener('click', () => {
        overlay.classList.toggle('hidden');
    });
    overlay.addEventListener('click', () => {
        overlay.classList.add('hidden');
    });
</script>

</body>
</html>