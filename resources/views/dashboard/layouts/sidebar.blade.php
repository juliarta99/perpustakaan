<nav id="sidebar" class="hidden h-screen lg:block lg:w-1/4 xl:w-1/5 z-[99] bg-gray-300 pt-24 fixed">
    <div class="w-full pl-10">
        <div id="menu">
            <ul class="flex flex-col">
                <li class="text-sm lg:text-md mt-1"><a href="/dashboard">Home</a></li>
                @can('is_admin')
                    <li class="text-sm lg:text-md mt-1"><a href="/dashboard/user/all">User</a></li>
                @endcan
                <li class="text-sm lg:text-md mt-1"><a href="/dashboard/buku">Buku</a></li>
                <li class="text-sm lg:text-md mt-1"><a href="/dashboard/kategori">Kategori</a></li>
                <li class="text-sm lg:text-md mt-1"><a href="/dashboard/rak">Rak</a></li>
                <li class="text-sm lg:text-md mt-1"><a href="/dashboard/peminjaman/all">Peminjaman</a></li>
                <li class="text-sm lg:text-md mt-1"><a href="/dashboard/pengembalian/all">Pengembalian</a></li>
                <li class="text-sm lg:text-md mt-1"><a href="/dashboard/sanksi">Sanksi</a></li>
            </ul>
        </div>
    </div>
</nav>