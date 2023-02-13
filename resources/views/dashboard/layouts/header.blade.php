<nav id="navbar" class="w-full fixed z-[999] bg-gray-500 shadow-md">
    <div class="w-full py-4 items-center px-5 flex justify-between">
        <h1 class="text-md md:text-lg mr-3 lg:text-xl xl:text-2xl font-semibold">Dashboard</h1>
        <form action="" class="w-full lg:w-1/2">
            <div class="flex w-full rounded-md shadow-md">
                <input type="text" value="{{ request('search') }}" name="search" placeholder="Cari buku....." class="outline-0 rounded-l-md w-full py-1 px-4">
                <button type="submit" class="bg-gray-200 rounded-r-md px-2 text-sm lg:text-md">Cari</button>
            </div>
        </form>
        <div class="ml-3">
            @guest
            <a href="/login" class="text-md lg:text-lg py-1 px-3 rounded-md bg-gray-100">Login</a>
            @endguest
            @auth
            <p>Halo, <span>{{ Auth::user()->name }}</span></p>
            <a href="/logout">Logout</a>
            @endauth
        </div>
    </div>
</nav>