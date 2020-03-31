@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-6">
    <div class="w-1/3 ">
        <form class="bg-gray-200 shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
        @csrf
                    
            <div class="text-center text-xl font-bold mb-4">{{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>
                <div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email@email.com" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>

                <div>
                    <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
