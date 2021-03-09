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

    public function detailArtikel($id_artikel){
        $artikel=DB::table('artikel as a')
        ->join('kategori as k','k.id_kategori','=','a.id_kategori')
        ->select('a.*','k.nama_kategori as kategori')
        ->where('id_artikel',$id_artikel)->first();
        // ->join('kategori as k','a.id_kategori','=','k.id_kategori')
        // ->select('a.*','k.id_kategori','k.nama_kategori as kategori')
        // ->where('id_kategori',$id_artikel)
        // ->get();

        return view('user.v_detailArtikel',compact('artikel'));
    }
}
