<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePacient;
use App\Models\Pacient;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacienteController extends Controller
{
    public function index(){

        $pacients = Pacient::latest()->paginate(5);

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

        return view('admin.pacients.show', compact('pacient'));
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

        return view('admin.pacients.update', compact('pacient'));
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

        $pacient->update($data);

        return redirect()
        ->route('pacients.index')
        ->with('message', 'Paciente editado com sucesso!');
    }

    public function search(Request $request){
        $filters = $request->except('_token');
        $pacients = Pacient::where('name', 'LIKE', "%{$request->search}%")
                            ->orWhere('cpf', 'LIKE', "%{$request->search}%")
                            ->paginate(5);

        return view('admin.pacients.index', compact('pacients', 'filters'));
    }
}
