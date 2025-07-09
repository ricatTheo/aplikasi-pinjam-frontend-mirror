<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="container">
        <div class="box">
          <div class="halfKiri">
            <img src="/image/FotoAutentikasi.png" alt="Ilustrasi" style="width:90%;margin:auto;display:block;">
          </div>
          <div class="halfKanan">
            <h2>Login</h2>
            <h6>World Vision of Indonesia</h6>
              <div class="button-group">
                <button type="button" class="satuPintu" onclick="window.location.href='{{ route('login') }}'">Satu Pintu</button>
                <button type="button" class="guest" onclick="window.location.href='{{ route('ruanganAku') }}'" id="guestPinjam">Guest</button>
              </div>
          </div>
        </div>
      </div> 
      <script>
        route RuanganAku
      </script>
      <script src="/Js/Autentikasi.js"></script>    
</body>
</html>