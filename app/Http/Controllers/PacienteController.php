<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePacient;
use App\Models\Pacient;
use DateTime;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(){

        $pacients = Pacient::get();

        return view('admin.pacients.index', compact('pacients'));
    }

    public function create(){
        return view('admin.pacients.create');
    }

    public function store(StoreUpdatePacient $request){
        //calcular idade

        $pacient = Pacient::create($request->all());

        return redirect()->route('pacients.index');
    }

    public function show($id){

        if(!$pacient = Pacient::find($id)){
            return redirect()->route('pacients.index');
        }

        return view('admin.pacients.show', compact('pacient'));
    }

    public function destroy($id){
        if(!$pacient = Pacient::find($id)){
            return redirect()->route('pacients.index');
        }

        $pacient->delete();

        return redirect()
        ->route('pacients.index')
        ->with('message', 'Paciente deletado com sucesso');
    }

    public function edit($id){
        if(!$pacient = Pacient::find($id)){
            return redirect()->back();
        }

        return view('admin.pacients.update', compact('pacient'));
    }

    public function update(StoreUpdatePacient $request, $id){
        if(!$pacient = Pacient::find($id)){
            return redirect()->route('pacients.index');
        }

        $pacient->update($request->all());

        return redirect()
        ->route('pacients.index')
        ->with('message', 'Paciente editado com sucesso!');
    }
}
