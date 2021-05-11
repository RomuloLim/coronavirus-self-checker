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
        $diag = Diagnostic::calcDiag($pacientStatus);
        $request['pacient_id'] = $id;
        Pacient::where('id', $pacient->id)->update(['diagnostic' => $diag]);
        Diagnostic::create($request->all());
        return redirect()
        ->route('pacients.index')
        ->with('message', 'Paciente diagnosticado com sucesso!');
    }
}
