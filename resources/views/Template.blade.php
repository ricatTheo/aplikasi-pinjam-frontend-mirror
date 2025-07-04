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
                    <a href="{{ route('RuanganAku') }}"
                       class="nav-link {{ request()->routeIs('RuanganAku') ? 'active' : '' }}"
                       data-id="ruangan">
                       Ruangan
                    </a>
                </li>
                <li>
                    <a href="{{ route('KendaraanAku') }}"
                       class="nav-link {{ request()->routeIs('KendaraanAku') ? 'active' : '' }}"
                       data-id="kendaraan">
                       Kendaraan
                    </a>
                </li>
                <li><a href="{{ route('BarangAku')}}" 
                       class="nav-link {{ request()->routeIs('BarangAku') ? 'active' : ''}}" 
                       data-id="barang">Barang</a></li>
                <li><a href="#" class="nav-link" data-id="booking">My Booking</a></li>
            </ul>
        </div>

        <div class="right-navbar">
            <button class="logout-btn" id="OutButton">Log out</button>
            <i class="fa-solid fa-circle-user fa-2x"></i>
        </div>
    </div>
    <script src="/Js/Main.js"></script> 
    @yield('content')
    <script>
        const LogoutUrl = "{{ route('Autentikasi') }}";
    </script>
    <script src="/Js/Logout.js"></script>
</body>
</html>