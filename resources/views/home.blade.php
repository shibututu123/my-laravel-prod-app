@extends('layouts.app')

@section('content')

<!-- Stat Cards + Add Job -->
<div class="flex flex-wrap items-start gap-4 mb-8">

    <div class="card bg-indigo-50 shadow-sm w-36 sm:w-44">
        <div class="card-body p-4 sm:p-5 relative overflow-hidden">
            <p class="text-4xl font-bold z-10 relative">0</p>
            <p class="text-sm text-base-content/70 z-10 relative">Running Jobs</p>
            <div class="absolute right-3 bottom-2 opacity-10 text-7xl leading-none">💼</div>
        </div>
    </div>

    <div class="card bg-indigo-50 shadow-sm w-36 sm:w-44">
        <div class="card-body p-4 sm:p-5 relative overflow-hidden">
            <p class="text-4xl font-bold z-10 relative">3</p>
            <p class="text-sm text-base-content/70 z-10 relative">Expired Jobs</p>
            <div class="absolute right-3 bottom-2 opacity-10 text-7xl leading-none">📋</div>
        </div>
    </div>

    <div class="ml-auto">
        <button class="btn text-white w-28 h-20 sm:w-32 sm:h-24 text-base rounded-xl shadow"
            style="background-color:#818cf8;">
            Add Job
        </button>
    </div>

</div>

<hr class="mb-6 border-base-300">

<!-- Job Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">

    @php
    $jobs = [
        ['title' => 'Test Forklift',       'expiry' => '02 Apr 2026', 'sourced' => 0, 'vacancies' => 2, 'label' => 'Sourced/Vacancies'],
        ['title' => 'Test Job for Driver', 'expiry' => '27 Mar 2026', 'sourced' => 0, 'vacancies' => 1, 'label' => 'Shortlisted/Vacancies'],
        ['title' => 'Test Job',            'expiry' => '03 Apr 2026', 'sourced' => 0, 'vacancies' => 2, 'label' => 'Sourced/Vacancies'],
    ];
    @endphp

    @foreach($jobs as $job)
    <div class="card bg-base-300 shadow">
        <div class="card-body p-5">
            <div class="flex justify-between items-start mb-1">
                <h3 class="font-bold text-lg">{{ $job['title'] }}</h3>
                <span class="badge bg-yellow-400 text-white border-0 text-xs">Expired</span>
            </div>
            <p class="text-red-500 text-sm font-medium mb-3">Expiry Date : {{ $job['expiry'] }}</p>
            <p class="text-4xl font-bold mb-1">
                {{ $job['sourced'] }}<span class="text-indigo-400">/{{ $job['vacancies'] }}</span>
            </p>
            <p class="text-sm text-base-content/60 mb-4">{{ $job['label'] }}</p>
            <button class="btn text-white border-0 w-full" style="background-color:#a5b4fc;">
                Processed
            </button>
        </div>
    </div>
    @endforeach

</div>

@endsection