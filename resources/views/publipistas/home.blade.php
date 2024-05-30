<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div class="navbar">
        <a href="{{ route ('home') }}">
        <h1 class="titulo aqui">Publipistas</h1>
        </a>
        <a href="{{ route ('reservas') }}">
            <h1 class="titulo">Tus reservas</h1>
            </a>
            @if($user->admin=="D")
            <a href="{{ route ('admin.index') }}">
                <h4>Admin</h4>
                </a>
            @endif
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
      @if(session('Succes'))
      <strong class="succes">{{session('Succes')}}</strong>
      @endif
      <div class="container">
        @foreach ($pistas as $pista)

       
        <div class="form-card">
            <h3>{{ $pista->Tipo }}</h3>
            <h3>{{ $pista->Ubicacion }}</h3>
            <form method="POST" action="{{ route('alquiler') }}">
                @csrf
                <div class="form-group">
                    <label for="fecha">Indica el día que quieres alquilar la pista</label>
                    <input type="date" name="fecha" id="fecha" class="form-input" required value="{{ $hoy }}" >
                </div>
                <input type="hidden" name="PistaId" id="PistaId" value="{{ $pista->id }}">
                <input type="hidden" name="PistaNombre" id="PistaNombre" value="{{ $pista->Tipo }}">
                <button type="submit" class="form-button">Reservar</button>
            </form>
        </div>
        @endforeach
    </div>

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
</body>
@vite(['resources/css/home.css', ])
</html>