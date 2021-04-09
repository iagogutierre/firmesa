<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Firmware;
use App\Equipment;
use App\MeshNetwork;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use PDF;

class InstallationKitController extends Controller
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
        $firmwares = Firmware::all();
        $equips = self::listar();
         return view('installationkit.create', compact('firmwares', 'equips'));
    }
    public function listar()
    {
        // $firmwares = DB::table('firmware')
        //                         ->select(DB::raw('e.manufacture, e.model, f.name, f.version '))
        //                         ->where( 'f.equipment_id','e.id')
        //                         ->get();
        $equipments = Equipment::join('firmware','equipment.id', '=', 'firmware.equipment_id')
                                ->get(['equipment.id','equipment.model', 'firmware.name', 'firmware.version', 'firmware.id']);
        return $equipments;
    }
    public function listarFirmwares(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pega o id do usuário logado
        $user_id  = Auth::id();

        $mensagens = [
            'required'=> 'O :attribute é um campo obrigatório.',
            'email.email'=> 'Por favor, informe um email válido.'
        ];

        $request->validate([
            'firm_model'=>'required',
            'email'=>'required|email'
        ], $mensagens);
        
        // pega os firmwares selecionados
        $images = $request->input('firm_model');
        // faz uma busca que retorna os firmwares selecionados 
        $imgs = DB::table('firmware')
                     ->select('path_to_firmware','equipment_id', 'name', 
                        'ip', 'config_interface','description', 'version')
                     ->whereIn('id', $images)
                     ->get();
        //apaga kit criado anteriormente 
        //unlink(public_path('kitdeinstalacao.zip'));
        //nome do arquivo .zip
        $zip_file = "kitdeinstalacao.zip";
        $zip = new ZipArchive();
        $fmz_logo = public_path()."/icons/firmesalogo.png";
        if ($zip->open(public_path($zip_file), ZipArchive::CREATE) === TRUE) {
            foreach ($imgs as $i) {
                //busca informações sobre o equipamento
                $equip = DB::table('equipment')
                     ->select('model','manufacture', 'potency', 'antenna',
                      'range','band', 'description', 'wan', 'photo', 'memory')
                     ->where('id', $i->equipment_id)
                     ->get(); 
                
                $photo = public_path()."/".$equip[0]->photo;
                $pdf_dir = public_path()."/pdf/".$equip[0]->model.".pdf";
                $data = [
                    'model' => $equip[0]->model,
                    'manufacture' => $equip[0]->manufacture,
                    'antenna'=>$equip[0]->antenna,
                    'range'=>$equip[0]->range,
                    'band'=>$equip[0]->band, 
                    'description'=>$equip[0]->description,
                    'wan'=>$equip[0]->wan,
                    'memory'=>$equip[0]->memory,
                    'potency'=>$equip[0]->potency,
                    'photo'=>$photo, 
                    'version' => $i->version,
                    'name'=>$i->name,
                    'description'=>$i->description, 
                    'ip'=>$i->ip,
                    'config_interface'=>$i->config_interface,
                    'version'=>$i->version,
                    'fmz_logo'=>$fmz_logo,
                ];

                //passa os dados coletados para o PDF
                $pdf = PDF::loadView('firmwares.pdf', $data)->save($pdf_dir);
                // return $pdf->stream();
                $pdf->output();
                //pega a imagem e o pdf para adicionar ao .zip
                $firm = storage_path('app/public/firmwares/'.$i->path_to_firmware);
                $zip->addEmptyDir("manuais");    
                $zip->addFile($pdf_dir, "manuais/".$equip[0]->model.".pdf");
                $zip->addEmptyDir("firmwares");
               
                $zip->addFile($firm,"firmwares/".$equip[0]->model.".zip");
            }
            $zip->close();
        }else
            echo "não criou";
        return response()->download($zip_file);
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
    }
}
