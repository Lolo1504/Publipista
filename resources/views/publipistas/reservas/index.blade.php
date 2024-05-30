<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservas</title>
</head>
<body>
    <div class="navbar">
        <a href="{{ route ('home') }}">
        <h1 class="titulo">Publipistas</h1>
        </a>
        <a href="{{ route ('reservas') }}">
            <h1 class="titulo aqui">Tus reservas</h1>
            </a>
        <div class="perfil" onclick="Dropdown()">{{$user->Usuario }}
          <div id="dropdown" class="dropdown-content">
              <a href="{{ route('perfil')}}"><button>Perfil</button></a>
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
       
     
        @foreach($reservas as $reserva) 
            <div class="reserva-card">
                <p>Tipo de Pista: {{ $reserva->Tipo }}</p>
                <p>Ubicacion: {{$reserva->Ubicacion}}</p>
                <p>Fecha: {{ $reserva->fecha }}</p>
                <p>Hora: 
                    @foreach ($Horas as $hora)
                        @if ($hora['numero'] == $reserva->H)
                            {{ $hora['horario'] }}
                        @endif
                    @endforeach
                </p>
                <form action="{{ route('reservas.borrar',[$reserva->id]) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" >Borrar</button>
                </form>
            </div> 
        @endforeach
       
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
@vite(['resources/css/reservas.css'])
</html>