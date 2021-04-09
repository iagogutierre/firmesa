<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


use App\Firmware;
use App\Equipment;

use Validator;
class FirmwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $firmwares = Firmware::all();
        // $user_id  = Auth::id();
       /// $firmwares = DB::table('firmware')->get();

        return view('firmwares.index', compact('firmwares'));
    }

    public function firmList()
    {
        $firmwares = DB::table('firmwares')->select('*');
        return datatables()->of($firmwares)
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $equipamentos = Equipment::all();
        return view('firmwares.create', compact('equipamentos'));
    }

  
    public function lista(){
        $firmwares = Firmware::paginate(10);
        return \Response::json($firmwares, 200);
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

        // $logo = $request->hasFile('logo');
        // $logo = $request->file('logo')->isValid();

        $namefile = null;
        $name = uniqid(date('HisYmd'));
        $request->validate([
            'version'=>'required',
            'name'=>'required',
            'ip'=>'required',
            'config_interface'=>'required',

        ]);
        
        // if($request->hasFile('logo') && $request->file('logo')->isValid()){
        //     $name = uniqid(date('HisYmd'));
        //     $ext = $request->logo->getClientOriginalExtension();
        //     $namefile = "{$name}.{$ext}";
        //     $upload = $request->logo->move(public_path('logos'), $namefile);
        //     //$upload =$request->logo->storeAs('logos', $namefile);
        //     $path_to_logo = "logos/".$namefile;

        //     if(!$upload)
        //         return redirect()
        //                 ->back()
        //                 ->with('error','Falha no upload');
        // }
        
        if($request->hasFile('firmwarezip') && $request->file('firmwarezip')->isValid()){
            if($request->firmwarezip->getClientOriginalExtension() == "zip"){
                $upload = $request->file('firmwarezip')->storeAs('firmwares', $name.".zip");
                $path_to_firmware = $name.".zip";// salva somente o nome
            }
        }
        
      

        $firmware = new Firmware([
            'user_id'=>$user_id,
            'equipment_id'=>$request->get('equipment_id'),
            'name'=> $request->get('name'),
            'version'=>$request->get('version'),
            'description'=>$request->get('description'),
            'ip'=>$request->get('ip'),
            'config_interface'=>$request->get('config_interface'),
            'path_to_firmware'=>$path_to_firmware,
        ]);
        $firmware->save();
        return redirect('/home/')->with('success', 'Salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $firm = Firmware::find($id);
        return view('firmwares.listar', compact('firm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $firm = Firmware::find($id);
        return view('firmwares.edit', compact('firm'));
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
        $user_id  = Auth::id(); //carrega o usuario 
        $firm =  Firmware::find($id); // carrega o firmware 

        //se algum logo for carregado
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $namefile = null;
            $name = uniqid(date('HisYmd'));
            $ext = $request->logo->getClientOriginalExtension();
            $namefile = "{$name}.{$ext}";
            $upload = $request->logo->move(public_path('logos'), $namefile);


            if(!$upload)
                return redirect()
                        ->back()
                        ->with('error','Falha no upload');
        }else{
            dd($firm->path_to_logo);
        }

        //
        $request->validate([
            'version'=>'required',
            'model'=>'required',
            'manufacture'=>'required'
        ]);

        
        $firm->name = $request->get('name');
        $firm->version = $request->get('version');
        $firm->model = $request->get('model');
        $firm->manufacture = $request->get('manufacture');
        $firm->logo = $namefile;

        $firm->save();
        return redirect('/firmwares')->with('success', 'Firmware atualizado');




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
        $firm = Firmware::find($id);
        
        unlink(public_path($firm->path_to_logo)); # remove logo do firmware
        unlink(public_path('pdf/'.$firm->model.'.pdf')); # remove o manual
        Storage::delete('firmwares/'.$firm->path_to_firmware); #remove firmware 
        $firm->delete();

        return redirect('/firmwares')->with('success', 'Firmware deletado');
    }
}
