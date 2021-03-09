<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artikel=DB::table('artikel as a')->orderBy('created_at','asc')
        ->join('kategori as k','k.id_kategori','=','a.id_kategori')
        ->select('a.*','k.nama_kategori as kategori')
        ->get();
        return view('user.v_home',compact('artikel'));
    }
}
