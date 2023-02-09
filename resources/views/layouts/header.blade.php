<nav class="w-full fixed z-[999] bg-blue-500 shadow-md">
    <div class="w-full py-4 items-center px-5 flex">
        <h1 class="text-md md:text-lg mr-3 lg:text-xl xl:text-2xl font-semibold">Perpustakaan</h1>
        <form action="" class="w-full lg:w-1/2">
            @csrf
            <div class="flex w-full rounded-md shadow-md">
                <input type="text" name="search" placeholder="Cari buku....." class="outline-0 rounded-l-md w-full py-1 px-4">
                <button class="bg-blue-200 rounded-r-md px-2 text-sm lg:text-md">Cari</button>
            </div>
        </form>
    </div>
</nav>