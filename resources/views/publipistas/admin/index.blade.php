<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
</head>
<body>
    <div class="navbar">
        <a href="{{ route ('home') }}">
        <h1 class="titulo">Publipistas</h1>
        </a>
        <a href="{{ route ('reservas') }}">
            <h2 class="titulo">Reservas</h2>
            </a>
            @if($user->admin=="D")
            <a href="{{ route ('admin.index') }}">
                <h3 class="titulo">Admin</h3>
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
    <div class="container">
<a class="add" href="{{ route ('admin.create')}}" > Añadir pista </a>            
<h1 class="A">Pistas</h1>    
            <table>          
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Ubicacion</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($pistas as $pista)
                <tr>
                    <td>{{$pista->id}}</td>
                    <td>{{$pista->Tipo}}</td>
                    <td>{{$pista->Ubicacion}}</td>
                    <td><a href="{{route('admin.edit',[$pista->id])}}" class="edit">Editar</a>
                    </td>
                        <td>
                        <form action="{{ route('admin.destroy',[$pista->id]) }}" method="POST">
                            @method('delete')
                            @csrf
                        
                            <button type="submit" >Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <h1 class="A">Usuarios</h1>    
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th colspan="2"></th>
                </tr>
                @foreach($users as $use)
                @if(!$use->admin)
                <tr>
                  
                    <td>{{$use->id}}</td>
                    <td>{{$use->Nombre}}</td>
                    <td>{{$use->Apellido}}</td>
                    <td>{{$use->Usuario}}</td>
                    <td width="10px"><a href="{{Route('admin.show',[$use->id])}}">Reservas<a></td>
                    <td>
                        <form action="{{ route('admin.borrar',[$use->id]) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </thead>
        
        </table> 
        </div>
    
</body>
@vite(['resources/css/admin.css'])
</html>