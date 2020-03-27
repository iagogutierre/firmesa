<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


use App\Firmware;


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
        // $firmwares = Firmware::all();
        // $user_id  = Auth::id();
        $firmwares = DB::table('firmware')->get();

        return view('firmwares.index', compact('firmwares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('firmwares.create');
    }

    public function listar()
    {
        $firmwares = DB::table('firmware')->get();
        return $firmwares;
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
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $name = uniqid(date('HisYmd'));
            $ext = $request->logo->getClientOriginalExtension();
            $namefile = "{$name}.{$ext}";
            $upload = $request->logo->move(public_path('logos'), $namefile);
            //$upload =$request->logo->storeAs('logos', $namefile);
            $path_to_logo = storage_path("logos/".$namefile);

            if(!$upload)
                return redirect()
                        ->back()
                        ->with('error','Falha no upload');
        }

        if($request->hasFile('firmwarezip') && $request->file('firmwarezip')->isValid()){
            if($request->firmwarezip->getClientOriginalExtension() == "zip"){
                $upload = $request->file('firmwarezip')->storeAs('firmwares', $name.".zip");
                $path_to_firmware = $name.".zip";// salva somente o nome
            }
        }
        
        $request->validate([
            'version'=>'required'
        ]);

        $firmware = new Firmware([
            'user_id'=>$user_id,
            'manufacture' => $request->get('manufacture'),
            'model' => $request->get('model'),
            'version'=>$request->get('version'),
            'potency'=> $request->get('potency'),
            'antenna'=>$request->get('antenna'),
            'range'=>$request->get('range'),
            'band'=>$request->get('band'),
            'wan'=>$request->get('wan'),
            'memory'=>$request->get('memory'),
            'ip'=>$request->get('ip'),
            'config_interface'=>$request->get('config_interface'),
            'path_to_logo'=>$path_to_logo,
            'path_to_firmware'=>$path_to_firmware,

            'logo' =>$namefile,

        ]);
        $firmware->save();
        return redirect('/')->with('success', 'Salvo com sucesso');
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
        //
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
        $user_id  = Auth::id();

        $logo = $request->hasFile('logo');
        $logo = $request->file('logo')->isValid();

        $namefile = null;
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $name = uniqid(date('HisYmd'));
            $ext = $request->logo->getClientOriginalExtension();
            $namefile = "{$name}.{$ext}";
            $upload = $request->logo->move(public_path('logos'), $namefile);


            if(!$upload)
                return redirect()
                        ->back()
                        ->with('error','Falha no upload');
        }

        //
        $request->validate([
            'version'=>'required',
            'model'=>'required',
            'architeture'=>'required',
            'manufacture'=>'required'
        ]);

        $firm =  Firmware::find($id);
        $firm->name = $request->get('name');
        $firm->version = $request->get('version');
        $firm->model = $request->get('model');
        $firm->architeture = $request->get('architeture');
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
        
        dd(unlink(public_path("logos/002252202002095e3f50dc4338d.jpg")));
        
        $firm->delete();

        return redirect('/firmwares')->with('success', 'Firmware deletado');
    }
}
