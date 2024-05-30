
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <title>Welcome</title>
</head>
<body>
    
 
    <nav class="mx-3 flex flex-1 center">
        <div class="card">
            <div class="titulo">  <h1>PUBLIPISTAS

            </h1></div>
          
            
        
        <div class="boton">
            <a
                href="{{ route('login') }}"
            >
                INICIAR SESION
            </a>
            </div>
          
                <div class="boton" >
  <a  href="{{ route('register') }}"
                   
                >
                    REGISTRO
                </a>
                </div>
               
            
               
        
        </div>
    </nav>

</body>
</html>
@vite(['resources/css/auth.css', ])
@vite([])

