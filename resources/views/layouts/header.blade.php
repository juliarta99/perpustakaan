<nav id="navbar" class="w-full fixed z-[999] bg-blue-500 shadow-md">
    <div class="w-full py-4 items-center px-5 flex justify-between">
        <h1 class="text-md md:text-lg mr-3 lg:text-xl xl:text-2xl font-semibold">Perpustakaan</h1>
        <form action="/" class="w-full lg:w-1/2">
            <div class="flex w-full rounded-md shadow-md">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari buku....." class="outline-0 rounded-l-md w-full py-1 px-4">
                <button type="submit" class="bg-blue-200 rounded-r-md px-2 text-sm lg:text-md">Cari</button>
            </div>
        </form>
        <div class="ml-3">
            @guest
            <a href="/login" class="text-md lg:text-lg py-1 px-3 rounded-md bg-gray-100">Login</a>
            @endguest
            @auth
            <p id="btnProfile" class="text-sm lg:text-md cursor-pointer">Halo, <span>{{ Auth::user()->name }}</span></p>
            <div id="showMenu" class="hidden w-auto px-4 py-2 translate-y-4 rounded-md shadow-md absolute">
                <a href="/logout" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>                      
                    <p class="text-sm ml-2 lg:text-md">Logout</p>
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>