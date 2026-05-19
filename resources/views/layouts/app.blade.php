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

    <!-- ===== SIDEBAR ===== -->
    <aside class="w-52 bg-white flex flex-col justify-between py-6 px-3 shadow-md fixed h-full z-10">
        <div>
            <!-- User -->
            <div class="flex items-center gap-2 px-2 mb-8">
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

            <!-- Nav Links -->
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

        <!-- Bottom Logo -->
        <div class="flex items-center gap-2 px-2">
            <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <span class="font-bold text-sm">Agentic Ai</span>
        </div>
    </aside>

    <!-- ===== MAIN AREA ===== -->
    <div class="ml-52 flex-1 flex flex-col">

        <!-- ===== HEADER ===== -->
        <header class="bg-white shadow-sm px-6 py-3 sticky top-0 z-10">
            <select class="select select-bordered w-full max-w-xl bg-base-100 text-sm">
                <option>Action Workforce - NSW - AP</option>
                <option>Action Workforce - VIC - AP</option>
                <option>Action Workforce - QLD - AP</option>
            </select>
        </header>

        <!-- ===== PAGE CONTENT ===== -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>