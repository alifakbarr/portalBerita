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
        ->select('a.judul_artikel','a.created_at','a.gambar_artikel','u.name')
        ->where('a.id_user',Auth::user()->id)->get();
        return view('admin.artikel.v_artikel',compact('artikel'));
    }

    public function tambah(){
        $kategori=DB::table('kategori')->orderBy('nama_kategori')->get();
        return view('admin.artikel.v_tambahArtikel',compact('kategori'));
    }

    public function tambahArtikel(){
        Request()->validate([
            'judul_artikel'=> 'required',
            'isi_artikel' => 'required',
            'gambar_artikel'=>'required|mimes:jpg,bmp,png,jpeg',
            'id_kategori'=>'required',
        ],[
            'judul_artikel.required' =>'Wajib diisi',
            'isi_artikel.required' =>'Wajib diisi',
            'id_kategori.required' =>'Wajib diisi',
            'gambar_artikel.required' =>'Wajib diisi',
            'gambar_artikel.mimes' =>'Wajib jpg,bmp,png,jpeg',
        ]);
        
        $file=Request()->gambar_artikel;
        $fileName=Request()->judul_artikel.'.'.$file->extension();
        $file->move(public_path('foto_artikel'),$fileName);



        DB::table('artikel')->insert([
            'judul_artikel'=>Request()->judul_artikel,
            'isi_artikel'=>Request()->isi_artikel,
            'id_kategori'=>Request()->id_kategori,
            'id_user'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'gambar_artikel'=>$fileName,
        ]);
        return redirect('/admin/artikel')->with('pesan','Tambah Artikel Berhasil');


    }
}
