<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam</title>
    <link rel="stylesheet" href="/css/Main.css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
        <div class="navbar">
        <div class="left-navbar">
            <img src="/image/image.png" alt="logo" class="logo">
        </div>


        <div class="middle-navbar">
            <ul>
                <li>
                    <a href="{{ route('ruanganAku') }}"
                       class="nav-link {{ request()->routeIs('ruanganAku') ? 'active' : '' }}"
                       data-id="ruangan">
                       Ruangan
                    </a>
                </li>
                <li>
                    <a href="{{ route('kendaraanAku') }}"
                       class="nav-link {{ request()->routeIs('kendaraanAku') ? 'active' : '' }}"
                       data-id="kendaraan">
                       Kendaraan
                    </a>
                </li>
                <li><a href="{{ route('barangAku')}}" 
                       class="nav-link {{ request()->routeIs('barangAku') ? 'active' : ''}}" 
                       data-id="barang">Barang</a></li>
                <li><a href="#" class="nav-link" data-id="booking">My Booking</a></li>
            </ul>
        </div>

        <div class="right-navbar">
            @if(Auth::check() || session('staff_logged_in'))
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button class="logout-btn" id="OutButton">Log out</button> 
            @endif
        </div>
    </div>
    <script src="/Js/Main.js"></script> 
    @yield('content')
    <script>
        const LogoutUrl = "{{ route('autentikasi') }}";
    </script>
    <script src="/Js/Logout.js"></script>
</body>
</html>