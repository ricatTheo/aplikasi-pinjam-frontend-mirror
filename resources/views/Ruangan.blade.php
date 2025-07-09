@extends('Template')

@section('content')

<div class="container">
    <!-- Room Card 1 -->
    @foreach ($ruangans as $ruang)
        <div class="room-card">
            <img src="/image/download.jpeg" alt="Ruangan Papua" class="room-image">
            <div class="room-content">
                <h3>{{ $ruang->nama }}</h3>
                <p class="location">
                    <i style="color: #00bfff;" class="fa-solid fa-location-dot"></i>
                    <a href="#">{{ $ruang->lokasi }}</a>
                </p>
                <p class="facilities">
                @forelse ($ruang->fasilitas as $f)
                    {{ $f->nama }}
                @empty
                    Tidak ada fasilitas
                @endforelse
                </p>
                <p class="seats">
                    <i class="fa-solid fa-chair"></i> {{ $ruang->jumlahKursi }}
                </p>
                <div class="book">
                    <button class="book-btn">Book</button>
                </div>
            </div>
        </div>
    @endforeach
    {{-- <div class="room-card">
        <img src="/image/download.jpeg" alt="Ruangan Papua" class="room-image">
        <div class="room-content">
            <h3>Ruangan Papua</h3>
            <p class="location">
                <i style="color: #00bfff;" class="fa-solid fa-location-dot"></i>
                <a href="#">Wahana Visi Indonesia Tangerang Bintaro</a>
            </p>
            <p class="facilities">
                Free Wi-Fi &nbsp;&nbsp; 24 hour &nbsp;&nbsp; Free Wi-Fi
            </p>
            <p class="seats">
                <i class="fa-solid fa-chair"></i> Total seat: 13
            </p>
            <div class="book">
                <button class="book-btn">Book</button>
            </div>
        </div>
    </div>
    
    <!-- Room Card 2 -->
    <div class="room-card">
        <img src="/image/download.jpeg" alt="Ruangan Kalimantan" class="room-image">
        <div class="room-content">
            <h3>Ruangan Kalimantan</h3>
            <p class="location">
                <i style="color: #00bfff;" class="fa-solid fa-location-dot"></i>
                <a href="#">Wahana Visi Indonesia Tangerang Bintaro</a>
            </p>
            <p class="facilities">
                Free Wi-Fi &nbsp;&nbsp; 24 hour &nbsp;&nbsp; Free Wi-Fi
            </p>
            <p class="seats">
                <i class="fa-solid fa-chair"></i> Total seat: 10
            </p>
            <div class="book">
                <button class="book-btn">Book</button>
            </div>
        </div>
    </div>
    
    <!-- Room Card 3 -->
    <div class="room-card">
        <img src="/image/download.jpeg" alt="Ruangan Jawa" class="room-image">
        <div class="room-content">
            <h3>Ruangan Jawa</h3>
            <p class="location">
                <i style="color: #00bfff;" class="fa-solid fa-location-dot"></i>
                <a href="#">Wahana Visi Indonesia Tangerang Bintaro</a>
            </p>
            <p class="facilities">
                Free Wi-Fi &nbsp;&nbsp; 24 hour &nbsp;&nbsp; Free Wi-Fi
            </p>
            <p class="seats">
                <i class="fa-solid fa-chair"></i> Total seat: 15
            </p>
            <div class="book">
                <button class="book-btn">Book</button>
            </div>
        </div>
    </div>
    
    <!-- Room Card 4 -->
    <div class="room-card">
        <img src="/image/download.jpeg" alt="Ruangan Sumatera" class="room-image">
        <div class="room-content">
            <h3>Ruangan Sumatera</h3>
            <p class="location">
                <i style="color: #00bfff;" class="fa-solid fa-location-dot"></i>
                <a href="#">Wahana Visi Indonesia Tangerang Bintaro</a>
            </p>
            <p class="facilities">
                Free Wi-Fi &nbsp;&nbsp; 24 hour &nbsp;&nbsp; Free Wi-Fi
            </p>
            <p class="seats">
                <i class="fa-solid fa-chair"></i> Total seat: 12
            </p>
            <div class="book">
                <button class="book-btn">Book</button>
            </div>
        </div>
    </div>
    
    <!-- Room Card 5 -->
    <div class="room-card">
        <img src="/image/download.jpeg" alt="Ruangan Sulawesi" class="room-image">
        <div class="room-content">
            <h3>Ruangan Sulawesi</h3>
            <p class="location">
                <i style="color: #00bfff;" class="fa-solid fa-location-dot"></i>
                <a href="#">Wahana Visi Indonesia Tangerang Bintaro</a>
            </p>
            <p class="facilities">
                Free Wi-Fi &nbsp;&nbsp; 24 hour &nbsp;&nbsp; Free Wi-Fi
            </p>
            <p class="seats">
                <i class="fa-solid fa-chair"></i> Total seat: 8
            </p>
            <div class="book">
                <button class="book-btn">Book</button>
            </div>
        </div>
    </div>
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">&raquo;</a>
        </div> --}}
</div>
@endsection