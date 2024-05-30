<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Alquiler;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    public function create(Request $request)
    {   //Con esto sacamos el usuario que se encuentra logueado en estos momentos
        $user= auth::user();
        
        $pista["Id"] = $request->PistaId;
     
      
        $fecha = $request->fecha;
        
        $hoy= date("Y-m-d");
      
        //Comparamos con un if si  $fecha es menor a hoy, si lo es nos redirige al home porque no queremos que $fecha sea anterio a al que hay en $hoy 
        if ($fecha < $hoy) {
            
            return redirect()->route('home' )->with('info', "La fecha proporcionada no es válida .");
        } else {
            //Creamos un array $horarios en formato clave valor siendo la clave un numero del 1 al 10 y el valor 
            //las horas de 9 de la mañana a 9 de la noche evitando reservar entre las 2 y las 4 de la tarde
            $horarios = [
                1 => '09:00-10:00',
                2 => '10:00-11:00',
                3 => '11:00-12:00',
                4 => '12:00-13:00',
                5 => '13:00-14:00',
                6 => '16:00-17:00',
                7 => '17:00-18:00',
                8 => '18:00-19:00',
                9 => '19:00-20:00',
                10 => '20:00-21:00'
            ];
            //Creamos la variable $ocupados en la que vamos a almacenar el campo de H (que siempre va a ser un valor del 1 al 10) 
            //de la pista y la fecha que hemos escogido nosotros
            $ocupados = Alquiler::whereDate('dia', $fecha)
            ->where('IdPista','=',$request->PistaId)
            ->pluck('H')->toArray();
            //Creamos $Disponibles para asegurarnos que este vacio
            $Disponibles = [];
            //Hacemos un foreach del array $horarios donde la clave es la variable $numero y el valor es la variable $Hora
            foreach ($horarios as $numero => $Hora) {
                //Con el condicionall IF le decimos que si $numero no esta en $ocupados guarde en $Disponibles la clave y el valor
                //un ejemplo para que se entienda mejor si en el array $ocupados se encuentra el 1 y 2  que pertenezen a las horas 
                // 9-10 y 10-11  no se almacenaran en el array Disponibles y en la pagina del alquiler no apareceran esas horas
                if (!in_array($numero, $ocupados)) {
                    $Disponibles[] = ['numero' => $numero,'horario' => $Hora];
                }
            }
           if(!$Disponibles)
           {
            //Si no hay ninguna hora disponible devuelve ese mensaje, es decir si la varibles $Disponibles esta vacia
            return redirect()->route('home' )->with('info', "Ese dia no hay horas disponibles para esa pista");
           } 
           
            return view('publipistas.alquiler.index',compact('Disponibles','pista','user','fecha'));
        }
    }    
public function store(Request $request)
    { 
        $fecha = $request->fecha;
       
        if(!$request->horas)
        {
            //Si no se a introducido ninguna hora vuelves a la pagina del alquiler para que el usuario seleccione la hora
            
            return redirect()->route('home' )->with('info', "Error no se ha introducido ninguna hora");

        }
            //Con esto hacemos la reserva, es decir por cada hora que haya puesto el usuario se guardara en la tabla alquiler los datos necesarios
            //y con esto la reserva estara realizada
            foreach($request->horas as $hora)
            {
                Alquiler::create([
                    'dia'=>$fecha,
                    'H'=>$hora,
                    'IdPista'=>$request->PistaId,
                    'IdUser'=>$request->IdUsuario,
                ]);
            }
            //Una vez echa la reserva volvemos al home con un mensaje de que todo esta correcto
            return redirect()->route('home' )->with('Succes', "Reserva hecha correctamente.");
        

      

        
    }
}
