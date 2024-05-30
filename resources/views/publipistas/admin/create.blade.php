<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear</title>
</head>
<style>
    strong{
  position: absolute;
  color: white;
  margin-top:50px; 
  font-size: 16px;
  padding: 10px;
  margin-bottom: 20px;
  width: 100%;
  background-color: red;
  text-align: center;
}

</style>
<body>
    @if(session('info'))
    <strong>{{session('info')}}</strong>
    @endif
    <form calss="form"action="{{Route ('admin.store')}}" method="POST">
        @csrf
        <label for="Tipo">Introduce el tipo de  pista</label>
        <input type="text" name="Tipo">
        <br>
        <label for="Ubicacion">Introduce la ubicacion de la pista</label>
        <input type="text" name="Ubicacion">
        <input type="submit">
    </form>
</body>
</html>