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
        ->select('a.*','k.nama_kategori as kategori','k.id_kategori')
        ->get();
        $kategori=DB::table('kategori')->get();
        
        return view('user.v_home',compact('artikel','kategori'));
    }

    public function detailArtikel($id_artikel){
        if(!DB::table('artikel')->where('id_artikel',$id_artikel)->first()){
            abort(404);
        }
        $artikel=DB::table('artikel as a')
        ->join('kategori as k','k.id_kategori','=','a.id_kategori')
        ->join('users as u','a.id_user','=','u.id')
        ->select('a.*','k.nama_kategori as kategori','u.name')
        ->where('id_artikel',$id_artikel)->first();
        $kategori=DB::table('kategori')->get();
        $komentar=DB::table('komentar')->where('id_artikel',$id_artikel)->get();

        $hitung=DB::table('komentar')->where('id_artikel',$id_artikel)->count();
        return view('user.v_detailArtikel',compact('artikel','komentar','hitung','kategori'));
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

    public function artikelKategori($id_kategori){
        $data=DB::table('artikel as a')
        ->join('kategori as k','k.id_kategori','=','a.id_kategori')
        ->where('a.id_kategori',$id_kategori)
        ->select('a.*','k.nama_kategori as kategori')
        ->orderBy('created_at','asc')
        ->get();
        $kategori=DB::table('kategori')->get();
        return view('user.v_artikelKategori',compact('data','kategori'));
    }
}
