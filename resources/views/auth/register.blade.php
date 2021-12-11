@extends('layouts.auth')

@section('content')

<div class="flex items-center justify-center">
    <div class="px-4 py-0 sm:px-4 md:px-8 lg:px-8 xl:px-12 2xl:px-20 w-full">
        <form method="POST" action="{{ route('register') }}">

            <h1 class="text-center font-bold tracking-wider text-2xl mb-8 w-full text-gray-600">
                Register
            </h1>
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-primary text-sm font-bold mb-2 sm:mb-4">
                    Full Name:
                </label>

                <input id="name" type="text"
                    class="form-input @error('name')  border-red-500 @enderror w-full rounded-md appearance-none border p-4 font-light leading-tight focus:outline-none focus:shadow-outline"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-primary text-sm font-bold mb-2 sm:mb-4">
                    Email:
                </label>

                <input id="email" type="email" name="email"
                    class="form-input @error('email') border-red-500 @enderror w-full rounded-md appearance-none border p-4 font-light leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-primary text-sm font-bold mb-2 sm:mb-4">
                    Password:
                </label>

                <input id="password" type="password" name="password"
                    class="form-input @error('password') border-red-500 @enderror  w-full rounded-md appearance-none border p-4 font-light leading-tight focus:outline-none focus:shadow-outline"
                    required autocomplete="new-password">

                @error('password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="block text-primary text-sm font-bold mb-2 sm:mb-4">
                   Confirm Password:
                </label>

                <input id="password-confirm" type="password"
                    class="form-input w-full rounded-md appearance-none border p-4 font-light leading-tight focus:outline-none focus:shadow-outline"
                    name="password_confirmation" required autocomplete="new-password">

            </div>




            <button type="submit"
                class="w-full select-none whitespace-no-wrap p-3 rounded-md text-base leading-normal no-underline text-gray-100 bg-primary hover:bg-primary-light sm:py-4">
                Register
            </button>

            @if (Route::has('register'))
            <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                Already have an account?
                <a class="text-primary hover:text-primary-light no-underline hover:underline"
                    href="{{ route('login') }}">
                    Login
                </a>
            </p>
            @endif



        </form>

    </div>
</div>


@endsection