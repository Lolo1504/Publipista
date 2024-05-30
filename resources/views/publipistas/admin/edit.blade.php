<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>editar</title>
</head>
<body>
    <form method="post" action="{{route('admin.update',$pista->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <label for="Tipo">Introduce el tipo de  pista</label>
        <input type="text" name="Tipo" value = "{{old('Tipo', $pista->Tipo) }}" >
        <br>
        <label for="Ubicacion">Introduce la ubicacion de la pista</label>
        <input type="text" name="Ubicacion"  value = "{{old('Ubicacion', $pista->Ubicacion)  }}">
        <input type="submit">
    </form>
</body>
</html>