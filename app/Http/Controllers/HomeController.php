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
        ->join('users as u','a.id_user','=','u.id')
        ->select('a.*','k.nama_kategori as kategori','u.name')
        ->where('id_artikel',$id_artikel)->first();

        $komentar=DB::table('komentar')->where('id_artikel',$id_artikel)->get();

        $hitung=DB::table('komentar')->where('id_artikel',$id_artikel)->count();
        return view('user.v_detailArtikel',compact('artikel','komentar','hitung'));
    }

    public function tambahKomentar(Request $request,$id_artikel){
        DB::table('komentar')->insert([
            'id_artikel'=>$id_artikel,
            'email'=>$request->email,
            'komentar'=>$request->komentar,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        return redirect('/artikel/detailArtikel/'.$id_artikel);
    }
}
