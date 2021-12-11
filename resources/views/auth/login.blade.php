@extends('layouts.auth')

@section('content')

<div class="flex items-center justify-center">
    <div class="px-4 py-12 sm:px-4 md:px-12 lg:px-20 xl:px-20 2xl:px-20 w-full text-center">
        <form method="POST" action="{{ route('login') }}">

            <h1 class="font-bold tracking-wider text-3xl mb-8 w-full text-gray-600">
                Login
            </h1>
            @csrf
            <div class="mb-4">
                <input id="email" name="email" type="email" placeholder="Email"
                    class="form-input @error('email') border-red-500 @enderror w-full rounded-md appearance-none border p-4 font-light leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <input
                    class="w-full rounded-md appearance-none border p-4 font-light leading-tight focus:outline-none focus:shadow-outline"
                    <input id="password" name="password" type="password" placeholder="Password"
                    class="form-input @error('password') border-red-500 @enderror w-full rounded-md appearance-none border p-4 font-light leading-tight focus:outline-none focus:shadow-outline"
                    required>

                @error('password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror

            </div>

            <div class="flex align-right justify-between mb-5">
                <a class="text-sm text-primary hover:text-primary-light no-underline hover:underline" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>


            <button type="submit"
                        class="w-full select-none whitespace-no-wrap p-3 rounded-md text-base leading-normal no-underline text-gray-100 bg-primary hover:bg-primary-light sm:py-4">
                            Login
                        </button>

                        @if (Route::has('register'))
                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            Don't have an account
                            <a class="text-primary hover:text-primary-light no-underline hover:underline" href="{{ route('register') }}">
                               Register
                            </a>
                        </p>
                        @endif


           
        </form>

    </div>
</div>


@endsection