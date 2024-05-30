<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservar</title>
</head>
<body>
    <div class="navbar">
        <a href="{{ route ('home') }}">
        <h1 class="titulo" >Publipistas</h1>
        </a>
        <a href="{{ route ('reservas') }}">
          <h1 class="titulo">Tus reservas</h1>
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
      @if(session('info'))
      <strong>{{session('info')}}</strong>
      @endif    
      
      <div class="container">
            <div class="form-header">
                <h2 class="form-title">Selecciona la Hora: </h2>
            </div>

            <form action="{{ route('reservar') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="fecha" value="{{$fecha}}">
                    <input type="hidden" name="Disponibles[]" value="{{json_encode($Disponibles)}}">
                    <input type="hidden" name="PistaId" value="{{$pista["Id"]}}">
                    <input type="hidden" name="IdUsuario"  value="{{$user->id}}">
                    <div class="checkbox-group">
                        @foreach($Disponibles as $Disponible)
                        <label><input type="checkbox" name="horas[]" value="{{$Disponible['numero']}}"> {{$Disponible['horario']}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit">Reservar</button>
                </div>
            </form>
        </div>
</body>
<script>
    function Dropdown() {
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
@vite(['resources/css/alquiler.css'])
</html>