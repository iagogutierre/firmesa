<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Equipment;
use Validator;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipamentos = DB::table('equipment')->get();
        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id  = Auth::id();

        $namefile = null;
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $name = uniqid(date('HisYmd'));
            $ext = $request->photo->getClientOriginalExtension();
            $namefile = "{$name}.{$ext}";
            $upload = $request->photo->move(public_path('photos'), $namefile);
            $path_to_logo = "photos/".$namefile;

            if(!$upload)
                return redirect()
                        ->back()
                        ->with('error','Falha no upload');
        }
        
        $request->validate([
            'manufacture'=>'required',
            'model' =>'required'
        ]);

        $equip = new Equipment([
            'user_id'=>$user_id,
            'manufacture' => $request->get('manufacture'),
            'model' => $request->get('model'),
            'potency'=> $request->get('potency'),
            'antenna'=>$request->get('antenna'),
            'range'=>$request->get('range'),
            'band'=>$request->get('band'),
            'wan'=>$request->get('wan'),
            'description'=>$request->get('description'),
            'memory'=>$request->get('memory'),
            'photo'=>$path_to_logo,
            'logo' =>$namefile,

        ]);
        $equip->save();
        return redirect('/home/')->with('success', 'Equipamento cadastrado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equip = Equipment::find($id);
        // $firmwares = Equipment::join('firmware','equipment.id', '=', 'firmware.id')->where('equipment.id', '=', $id)
        //                ->get(['equipment.id','equipment.model', 'firmware.name',
        //                 'firmware.version', 'firmware.id']);

        $firmwares = DB::table('firmware')
                     ->select('id','path_to_firmware','equipment_id', 'name', 
                        'ip', 'config_interface','description', 'version')
                     ->where('equipment_id','=', $id)
                     ->get();             

         return view('equipamentos.listar', compact('equip', 'firmwares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equip = Equipment::find($id);
        return view('equipamentos.edit', compact('equip')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $equip = Equipment::find($id);

        //A foto do equipamento só é atualizada
        //se algum logo(photo) for carregado
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $namefile = null;
            $name = uniqid(date('HisYmd'));
            $ext = $request->photo->getClientOriginalExtension();
            $namefile = "{$name}.{$ext}";
            $upload = $request->photo->move(public_path('photos'), $namefile);


            if(!$upload)
                return redirect()
                        ->back()
                        ->with('error','Falha no upload');
        }

         $request->validate([
            'manufacture'=>'required',
            'model'=>'required',
        ]);
        
        $equip->manufacture = $request->get('manufacture');
        $equip->model = $request->get('model');
        $equip->potency = $request->get('potency');
        $equip->antenna = $request->get('antenna');
        $equip->range = $request->get('range');
        $equip->band = $request->get('band');
        $equip->memory = $request->get('memory');
        $equip->wan = $request->get('wan');
        $equip->description = $request->get('description');
        $equip->save();
        return redirect('/equipamentos')->with('success', 'Equipamento atualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $equip = Equipment::find($id);

        unlink(public_path($equip->path_to_logo)); # remove logo do firmware
        Storage::delete('equipamentos/'.$firm->path_to_firmware); #remove firmware 
        $equip->delete();
    }
}
