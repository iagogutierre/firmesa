<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Firmware;
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
         return view('installationkit.create', compact('firmwares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id  = Auth::id();
        $request->validate([
            'bssid'=>'required',
        ]);

        $images = $request->input('firm_model');
        

        $img = DB::table('firmware')
                     ->select('path_to_firmware')
                     ->whereIn('id', $images)
                     ->get();
        
        $images = $img->all(); 
        $images = Firmware::all();
        
        $zip_file = "kitdeinstalacao.zip";//nome do arquivo .zip
        $zip = new ZipArchive;
        if ($zip->open(public_path($zip_file), ZipArchive::CREATE) === TRUE) {
            # code...
            foreach ($images as $i) {
                # code...
                $data = [
                    'title' => 'First PDF for Medium',
                    'heading' => 'Hello from 99Points.info',
                    'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'        
                    ];

                
                $pdf = PDF::loadView('firmwares.pdf', $data);
                return $pdf->download('pdf.firmwares');
                // dd($i->manufacture);
                //obtem o caminho para o firmware
                // $invoke_file = storage_path('app/public/firmwares/'.$i->path_to_firmware);
                // adiciona ao .zip
                // $zip->addFile($invoke_file);
            }
            $zip->close();
        }else
            echo "não criou";

    


        return response()->download($zip_file);
        // return redirect('/kit')->with('success', 'Salvo com sucesso');
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
