
<?php 
use Illuminate\Support\Facades\Auth; 
$user = auth::user();

?>
    <div class="navbar">
      <a href="{{ route ('home') }}">
        <h1 class="titulo" >Publipistas</h1>
        </a>
      
        <button>{{$user->Usuario}}</button>
      </div>
     

@vite(['resources/css/barra.css'])