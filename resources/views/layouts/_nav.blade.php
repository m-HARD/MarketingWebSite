<ul class="flex justify-between bg-white border-b-2 px-10 py-2">
    <li class="mr-3">
        <a class="inline-block py-2 px-4 hover:text-blue-700 text-black" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </li>
    <li class="mr-3">
        <a class="inline-block py-2 px-4 text-gray-400 cursor-not-allowed" href="#">
            Search............
        </a>
    </li>
    <li class="mr-3">
        <div class="inline-block ">
            @guest
                    <div class="flex py-2 px-4">
                        <div class="">
                            <a class="p-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </div>
                        @if (Route::has('register'))
                            <div class="ml-2">
                                <a class="p-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        @endif
                    </div>
                @else

                    <div class="dropdown inline-block relative">
                      <button class="font-semibold py-2 px-4 rounded inline-flex items-center">
                        <span class="mr-1">{{ Auth::user()->name }}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                      </button>
                      <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 right-0 w-full">
                        <li class="">
                            <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                      </ul>
                    </div>
                   
                @endguest
        </div>
    </li>
  </ul>