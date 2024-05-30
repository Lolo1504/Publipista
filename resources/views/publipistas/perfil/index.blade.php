<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
</head>
<body>
  
  <div class="navbar">
    <a href="{{ route ('home') }}">
    <h1 class="titulo" >Publipistas</h1>
    </a>
    <a href="{{ route ('reservas') }}">
      <h1 class="titulo">Tus Reservas</h1>
      </a>
    <div class="perfil" onclick="toggleDropdown()">{{$user->Usuario }}
      <div id="dropdown" class="dropdown-content">
          <a href=""><button>Perfil</button></a>
          <form method="POST" action="{{ route('logout.destroy') }}">
              @csrf
              <button type="submit">Salir</button>
          </form>
      </div>
  </div>
  </div>
 
  <div class="container">
    <h1>Datos del Usuario</h1>
    <div class="user-info">
      <label for="nombre">Nombre:</label>
      <p id="nombre">{{$user->Nombre}}</p>
    </div>
    <div class="user-info">
      <label for="apellido">Apellido:</label>
      <p id="apellido">{{$user->Apellido}}</p>
    </div>
    <div class="user-info">
      <label for="dni">DNI:</label>
      <p id="dni">{{$user->DNI}}</p>
    </div>
    <div class="user-info">
      <label for="usuario">Usuario:</label>
      <p id="usuario">{{$user->Usuario}}</p>
    </div>
    <div class="user-info">
      <label for="gmail">Gmail:</label>
      <p id="gmail">{{$user->email}}</p>
    </div>
    <div class="user-info">
      <label for="calle">Calle:</label>
      <p id="calle">{{$user->Calle}}</p>
    </div>
    <a href="{{Route('profile.update')}}" class="button">Actualizar Datos</a>
  </div>
    
</body>
<script>
  function toggleDropdown() {
var dropdown = document.getElementById("dropdown");
dropdown.style.display === "none" ? dropdown.style.display = "block" : dropdown.style.display = "none";
}


window.onclick = function(event) {
var dropdown = document.getElementById("dropdown");
if (!event.target.matches('.perfil')) {
  dropdown.style.display = "none";
}
}
</script>
</html>
@vite(['resources/css/perfil.css'])
