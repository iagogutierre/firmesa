<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Firmware;
use App\MeshNetwork;
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
        $firmwares = Firmware::all();
        $networks = MeshNetwork::all();
        return view('home', compact('firmwares', 'networks'));
    }
}
