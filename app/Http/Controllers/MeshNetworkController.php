<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeshNetwork;
use App\Firmware;
use App\EquipInMesh;
use Illuminate\Support\Facades\Auth;

class MeshNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$firmwares = Firmware::pluck('model', 'id');
        //$selectedID = 1;
        //return view('networks.create', compact('selectedID','firmwares'));
        $firmwares = Firmware::all();
        return view('networks.create', compact('firmwares'));
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
        //
        var_dump($request); die();
        $request->validate([
            'firm_model'=>'required|array',
            'bssid'=>'required',
        ]);

        $network = new MeshNetwork([
            'bssid'=> $request->get('bssid'),
            'location'=>$request->get('location'),
            'users_attended' => $request->get('users_attended'),
            'nodes'=> $request->get('nodos'),
            'gateway' => $request->get('gateway')

        ]);
        $network->save();
        $equips = $request->input('firm_model');

        foreach ($equips as $equip ) {
          $equipInMesh = new EquipInMesh([
            'id_mesh'=>$network->id,
            'id_equipment'=> $user_id
            ]);

            $equipInMesh->save();
        }



        return redirect('/firmwares')->with('success', 'Salvo com sucesso');
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
        $mesh = MeshNetwork::find($id);
        return view('networks.listar', compact('mesh'));
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
        //
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
        $firm = MeshNetwork::find($id);
        $firm->delete();

        return redirect('/home')->with('success', 'Rede deletada');
    }

}
