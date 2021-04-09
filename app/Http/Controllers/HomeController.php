<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Firmware;
use App\Equipment;
use App\User; 
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $firmwares = Equipment::join('firmware','equipment.id', '=', 'firmware.equipment_id')
        //                         ->get(['equipment.id','equipment.model', 'firmware.name', 'firmware.version', 'firmware.id']);

       
        // $firmwares = Firmware::all();
        //$equipamentos = Equipment::all();
        $equipamentos = DB::table('equipment')->where('user_id', Auth::id())->get();

        $firmwares = Equipment::join('firmware','equipment.id', '=', 'firmware.equipment_id')
                                ->get(['equipment.id','equipment.model', 'firmware.name', 'firmware.version', 'firmware.id']);
        $usuarios = User::all();
        return view('home', compact('firmwares', 'equipamentos', 'usuarios'));
    }
}
