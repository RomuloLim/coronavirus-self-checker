<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use App\Models\Pacient;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    public function store(Request $request,$id){
        $pacient = Pacient::where('id', $id)->get()->first();

        $pacientStatus = ((count($request->all()) - 1) * 100) / 14;
        if($pacientStatus <= 10){
            Pacient::where('id', $pacient->id)->update(['diagnostic' => "SINTOMAS INSUFICIENTES"]);
        }elseif($pacientStatus >= 40 && $pacientStatus < 60 ){
            Pacient::where('id', $pacient->id)->update(['diagnostic' => "POTENCIAL INFECTADO"]);
        }else{
            Pacient::where('id', $pacient->id)->update(['diagnostic' => "POSSÍVEL INFECTADO"]);
        }

        $request['pacient_id'] = $id;
        Diagnostic::create($request->all());
        return redirect()
        ->route('pacients.index')
        ->with('message', 'Paciente diagnosticado com sucesso!');
    }
}
