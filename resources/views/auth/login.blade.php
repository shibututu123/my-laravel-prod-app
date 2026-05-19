@extends('layouts.guest')

@section('content')
<div class="card shadow-2xl bg-white rounded-2xl w-full max-w-md mx-auto">
    <div class="card-body p-6 sm:p-10">

        <h2 class="text-3xl font-bold text-center mb-6">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text text-base">Email</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}"
                    placeholder="Enter your email"
                    class="input input-bordered w-full @error('email') input-error @enderror"
                    required autofocus />
                @error('email')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text text-base">Password</span>
                </label>
                <input type="password" name="password"
                    placeholder="••••••••"
                    class="input input-bordered w-full @error('password') input-error @enderror"
                    required />
                @error('password')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control mb-6">
                <label class="label cursor-pointer justify-start gap-3">
                    <input type="checkbox" name="remember" class="checkbox checkbox-primary" />
                    <span class="label-text text-base">Remember me</span>
                </label>
            </div>

            <div class="form-control mb-4">
                <button type="submit"
                    class="btn w-full text-white text-base font-semibold rounded-xl"
                    style="background-color:#4f35d2;">
                    Login
                </button>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center mt-2">
                    <a href="{{ route('password.request') }}"
                        class="text-sm underline"
                        style="color:#4f35d2;">
                        Forgot your password?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection