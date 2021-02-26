<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePacient;
use App\Models\Pacient;
use App\Models\Diagnostic;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacienteController extends Controller
{
    public function index(){

        $pacients = Pacient::latest()->simplePaginate(5);

        return view('admin.pacients.index', compact('pacients'));
    }

    public function create(){
        return view('admin.pacients.create');
    }

    public function store(StoreUpdatePacient $request){
        $data = $request->all();
        if($request->image->isValid()){

            $img = $request->image->store('pacients');
            $data['image'] = $img;
        }

        $pacient = Pacient::create($data);

        return redirect()
        ->route('pacients.index')
        ->with('message', 'Paciente criado com sucesso');
    }

    public function show($id){

        if(!$pacient = Pacient::find($id)){
            return redirect()->route('pacients.index');
        }

        $diagnostic = Diagnostic::where('pacient_id', $id)->get()->first();
        return view('admin.pacients.show', compact('pacient', 'diagnostic'));
    }

    public function destroy($id){
        if(!$pacient = Pacient::find($id)){
            return redirect()->route('pacients.index');
        }

        if(Storage::exists($pacient->image))
            Storage::delete($pacient->image);

        $pacient->delete();

        return redirect()
        ->route('pacients.index')
        ->with('message', 'Paciente deletado com sucesso');
    }

    public function edit($id){
        if(!$pacient = Pacient::find($id)){
            return redirect()->back();
        }
        $diagnostic = Diagnostic::where('pacient_id', $id)->get()->first();

        return view('admin.pacients.update', compact('pacient','diagnostic'));
    }

    public function update(StoreUpdatePacient $request, $id){
        if(!$pacient = Pacient::find($id)){
            return redirect()->back();
        }

        $data = $request->all();
        if($request->image && $request->image->isValid()){
            if(Storage::exists($pacient->image))
                 Storage::delete($pacient->image);
            $img = $request->image->store('pacients');
            $data['image'] = $img;
        }
        if($pacient['diagnostic'] == "---"){
            $pacient->update($data);
            return redirect()
            ->route('pacients.index')
            ->with('message', 'Paciente editado com sucesso!');
        }else{
            $diagnostic = Diagnostic::where('pacient_id', $id)->get()->first();
            $pacientStatus = ((count($request->all()) - 6) * 100) / 14;
            $data['diagnostic'] = Diagnostic::calcDiag($pacientStatus);

            //obter checkbox que não está marcado
            $checks = array('febre','coriza','nariz_ent','cansaco', 'tosse',
            'dor_cab', 'dor_corpo', 'mal_estar', 'dor_garganta', 'dif_respirar',
            'falta_paladar', 'falta_olfato', 'dif_loc', 'diarreia');

            foreach ($checks as $check){
                if(!$request->has($check)){
                    $request[$check] = '0';
                }
            }

            $pacient->update($data);

            $diagnostic->update($request->all());

            return redirect()
            ->route('pacients.index')
            ->with('message', 'Paciente editado com sucesso!');
        }
    }

    public function search(Request $request){
        $filters = $request->except('_token');
        $pacients = Pacient::where('name', 'LIKE', "%{$request->search}%")
                            ->orWhere('cpf', 'LIKE', "%{$request->search}%")
                            ->orWhere('diagnostic', 'LIKE', "%{$request->search}%")
                            ->paginate(5);

        return view('admin.pacients.index', compact('pacients', 'filters'));
    }

    public function createDiagnostic($id){
        if(!$pacient = Pacient::find($id)){
            return redirect()->back();
        }
        return view('admin.pacients.diagnostic', compact('pacient'));
    }
}
