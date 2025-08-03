<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <header id="navbar"
        class="{{ request()->is('/') ? 'fixed navbar-transparent' : 'bg-blue-800' }} top-0 left-0 w-full z-50 transition duration-300">
        <div class="flex items-center justify-between px-4 py-4">
            <!-- Logo -->
            <div class="text-xl font-bold text-white">
                Sawahan Lor
            </div>

            <!-- Menu Desktop -->
            <nav class="hidden lg:flex space-x-8 p-2">
                <a href="/" class="font-bold text-xl text-white outline-none hover:text-blue-300">Home</a>
                <a href="/profil" class="font-bold text-xl text-white outline-none hover:text-blue-300">Profil</a>
                <a href="/berita" class="font-bold text-xl text-white outline-none hover:text-blue-300">Berita</a>
                <a href="/potensi" class="font-bold text-xl text-white outline-none hover:text-blue-300">Potensi</a>
                <a href="/pengaduan" class="font-bold text-xl text-white outline-none hover:text-blue-300">Pengaduan</a>
            </nav>

            <!-- Hamburger Button -->
            <div class="lg:hidden">
                <button id="toggleMenu" class="text-gray-800 focus:outline-none">
                    <!-- Icon Hamburger -->
                    <svg id="iconOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <!-- Icon Close -->
                    <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div id="mobileMenu"
            class="lg:hidden px-4 pb-4 pt-2 bg-white shadow-md origin-top transform scale-y-0 opacity-0 transition duration-300 ease-out">
            <a href="/" class="font-bold block py-2 text-gray-800 hover:text-blue-300">Home</a>
            <a href="/profil" class="font-bold block py-2 text-gray-800 hover:text-blue-300">Profil</a>
            <a href="/berita" class="font-bold block py-2 text-gray-800 hover:text-blue-300">Berita</a>
            <a href="/potensi" class="font-bold block py-2 text-gray-800 hover:text-blue-300">Potensi</a>
            <a href="/pengaduan" class="font-bold block py-2 text-gray-800 hover:text-blue-300">Pengaduan</a>
        </div>
    </header>

    <!-- Konten -->
    <main>
        @yield('content')
    </main>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script Navbar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleMenu');
            const mobileMenu = document.getElementById('mobileMenu');
            const navbar = document.getElementById('navbar');

            const iconOpen = document.getElementById('iconOpen');
            const iconClose = document.getElementById('iconClose');

            let menuOpen = false;

            toggleButton.addEventListener('click', function() {
                menuOpen = !menuOpen;

                if (menuOpen) {
                    mobileMenu.classList.remove('opacity-0', 'scale-y-0');
                    mobileMenu.classList.add('opacity-100', 'scale-y-100');
                    iconOpen.classList.add('hidden');
                    iconClose.classList.remove('hidden');
                } else {
                    mobileMenu.classList.add('opacity-0', 'scale-y-0');
                    mobileMenu.classList.remove('opacity-100', 'scale-y-100');
                    iconOpen.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                }
            });

            window.addEventListener('scroll', function() {
                if (window.scrollY > 10) {
                    navbar.classList.add('bg-white', 'shadow-md', 'bg-blue-800');
                    navbar.classList.remove('navbar-transparent');
                } else {
                    navbar.classList.remove('bg-white', 'shadow-md', 'bg-blue-800');
                    navbar.classList.add('navbar-transparent');
                }
            });
        });
    </script>

    @stack('scripts')

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: '{{ $errors->first() }}',
                });
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                });
            });
        </script>
    @endif

</body>

</html>
