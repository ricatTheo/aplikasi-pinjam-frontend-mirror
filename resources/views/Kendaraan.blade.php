@extends('Template')

@section('content')

<div class="container">
    <div class="room-card">
        <img src="/image/mclaren.jpg" alt="Kendaraan" class="room-image">

            <div class="room-content">
                <h3>McLaren lu warna apa bos</h3>
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
        
        <div class="room-card">
            <img src="/image/mclaren.jpg" alt="Ruangan Papua" class="room-image">
    
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
            
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">&raquo;</a>
            </div>
        </div>
    </div>
@endsection