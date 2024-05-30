<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <table>
        <thead>
            <tr>
                <th>Tipo de Pista:</th>
                <th>Ubicacion</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Usuario</th>
                
            </tr>
            @foreach($reservas as $reserva)
            <tr>
              
                <td>{{ $reserva->Tipo }}</td>
                <td>{{$reserva->Ubicacion}}</</td>
                <td>{{ $reserva->fecha }}</td>
                <td> @foreach ($Horas as $hora)
                    @if ($hora['numero'] == $reserva->H)
                        {{ $hora['horario'] }}
                    @endif
                @endforeach</td>
                <td>{{$reserva->Usuario}}</td>
                
            </tr>
           
            @endforeach
        </thead>
    
    </table> </div>
</body>
@vite(['resources/css/admin.css'])
</html>