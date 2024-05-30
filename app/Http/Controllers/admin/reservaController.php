<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\Alquiler;

use Illuminate\Support\Facades\DB;

class reservaController extends Controller
{
    public function index(){
        $user=auth::user();
        $hoy =date("Y-m-d");
        $comprobar=Alquiler::select("id")
            ->where("IdUser","=",$user->id)
            ->where('dia','>=',$hoy)
            ->exists()
        ;
        $reservas=user::join('alquiler as al','al.IdUser','=','users.id')
            ->join('Pistas as pis','pis.id','=','al.IdPista')
            ->select('Usuario','al.id as id','al.dia',DB::raw("date_format(al.dia, '%d-%m-%Y') as fecha"),'al.H','pis.Tipo','pis.Ubicacion')
            ->where('users.id','=',$user->id)
            ->where('al.dia','>=',$hoy)
            ->groupby('Usuario','id','al.dia','al.H','pis.Tipo','pis.Ubicacion')
            ->orderby('al.dia','asc')
            ->orderby('al.H','asc')
            ->get()
            ;
        
        if(!$comprobar)
            {
                return redirect()->route('home' )->with('info',"No tienes ninguna reserva hecha ");
            }
            $H=$reservas->pluck('H')->toArray();
            
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
        $Horas= [];
        foreach ($horarios as $numero=>$Hora )
            {
                if(in_array($numero, $H))
                $Horas[]=[
                'numero' => $numero,
                'horario' => $Hora
                ];
            }
       
            
          return view('publipistas.reservas.index',compact('Horas','reservas','user'));
           
        ;
    }
    public function borrar($id)
    {
        
        $Alquiler=Alquiler::find($id);
        $Alquiler->delete();    
        return redirect()->route('reservas')->with('info','Reservada borrada  correctamente');
        
    }
}
