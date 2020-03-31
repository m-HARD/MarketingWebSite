@extends('layouts.app')

@section('content')

<div class="flex justify-center mt-6">
    <div class="w-1/3 ">
        <form class="bg-gray-200 shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Login') }}">
            @csrf
            <div class="text-center text-xl font-bold mb-4">
                {{ __('Admin Login') }}
            </div>

                    
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                {{ __('E-Mail Address') }}
            </label>
            <div>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">{{ __('Password') }}</label>
            <div>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="************" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="mb-6 flex items-baseline">
            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="block text-gray-700 text-sm font-bold mb-2 ml-2" for="remember">
                {{ __('Remember Me') }}
            </label>
          </div>



          <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password ?') }}
            </a>
            @endif
          </div>
        </form>
    </div>
</div>
@endsection
