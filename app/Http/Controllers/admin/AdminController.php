<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\pista;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $pistas=pista::all();
        $user=auth::user();
        $users=user::all();
        return view('publipistas.admin.index',compact('pistas','user','users'));
    }
    public function create(){
        return view('publipistas.admin.create');
    }
    public function show($id)
    {

        $hoy =date("Y-m-d");
        $reservas=user::join('alquiler as al','al.IdUser','=','users.id')
            ->join('Pistas as pis','pis.id','=','al.IdPista')
            ->select('Usuario','al.dia',DB::raw("date_format(al.dia, '%d-%m-%Y') as fecha"),'al.H','pis.Tipo','pis.Ubicacion')
            ->where('users.id','=',$id)
            ->where('al.dia','>=',$hoy)
            ->groupby('Usuario','al.dia','al.H','pis.Tipo','pis.Ubicacion')
            ->orderby('al.dia','asc')
            ->orderby('al.H','asc')
            ->get();
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
       
            
          return view('publipistas.admin.reservas',compact('Horas','reservas'));
           
        ;
    }
    public function store(Request $request){
       
        $pista=pista::select('Tipo','Ubicacion')
        ->where('Tipo','=',$request->Tipo)
        ->where('Ubicacion','=',$request->Ubicacion)
        ->exists();
        
        if($pista){
            return redirect()->route('admin.create')->with('info', 'Esa pista ya existe');
            }
        else
        {pista::create([
            'Tipo'=>$request->Tipo,
            'Ubicacion'=>$request->Ubicacion,

        ]);
        return redirect()->route('admin.index');
           
        }
        
        
    }
    public function edit($id)
    {
        $pista=pista::find($id);
        return view('publipistas.admin.edit',compact('pista'));
    }
    public function update(Request $request, $pista){
       
        $pista=pista::find($pista);
        $pista->update([
            'Tipo'=>$request->Tipo,
            'Ubicacion'=>$request->Ubicacion,
        ]);
        $pista->save();
        return redirect()->route('admin.index');        
        
    }
    public function destroy($id)
    {   
     
      
        
        $pista=pista::find($id);
        $pista->delete();
       
        return redirect()->route('admin.index');
        
    }
    public function borrar($id)
    {
        
        $user=user::find($id);
        $user->delete();    
        return redirect()->route('admin.index');
        
    }
}
