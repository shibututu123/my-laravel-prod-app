@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-base-200 flex items-center justify-center">
    <div class="card w-full max-w-md shadow-2xl bg-base-100">
        <div class="card-body">

            <h2 class="text-2xl font-bold text-center mb-4">
                {{ config('app.name') }} Login
            </h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-control mb-3">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        placeholder="you@example.com"
                        class="input input-bordered @error('email') input-error @enderror"
                        required autofocus />
                    @error('email')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-control mb-3">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password"
                        placeholder="••••••••"
                        class="input input-bordered @error('password') input-error @enderror"
                        required />
                    @error('password')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-control mb-4">
                    <label class="label cursor-pointer justify-start gap-3">
                        <input type="checkbox" name="remember" class="checkbox checkbox-primary" />
                        <span class="label-text">Remember me</span>
                    </label>
                </div>

                <div class="form-control">
                    <button type="submit" class="btn btn-primary w-full">Login</button>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-center mt-4">
                        <a href="{{ route('password.request') }}" class="link link-primary text-sm">
                            Forgot your password?
                        </a>
                    </div>
                @endif

            </form>
        </div>
    </div>
</div>
@endsection