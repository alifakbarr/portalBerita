<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $artikel = DB::table('artikel as a')
        ->join('users as u','u.id','=','a.id_user')
        // agar bisa dipakai
        ->select('a.judul_artikel','a.created_at','u.name')
        ->where('a.id_user',Auth::user()->id)->get();
        return view('admin.artikel.v_artikel',compact('artikel'));
    }

    public function tambah(){
        return view('admin.artikel.v_tambahArtikel');
    }

    public function tambahProses(){
        Request()->validate([
            'judul_artikel'=> 'required',
            'isi_artikel' => 'required'
        ],[
            'judul_artikel.required' =>'Wajib diisi',
            'isi_artikel.required' =>'Wajib diisi',
        ]);
        
        $file=Request()->gambar_artikel;
        $fileName=Request()->judul_artikel.'.'.$file->extension();
        $file->move(public_path('foto_artikel'),$fileName);

        $data=[
            'judul_artikel'=>Request()->judul_artikel,
            'isi_artikel'=>Request()->isi_artikel,
            'id_user'=>Request()->Auth::user()->id,
            'created_at'=>Request()->date('Y-m-d H:i:s'),
            'updated_at'=>Request()->date('Y-m-d H:i:s'),
            'foto_siswa'=>$fileName,

        ];

        DB::table('artikel')->insert($data);
        return redirect('/admin/artikel')->route('artikel')->with('pesan','Tambah Artikel Berhasil');


    }
}
