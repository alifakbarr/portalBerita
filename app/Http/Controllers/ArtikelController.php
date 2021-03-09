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
        ->join('kategori as k','a.id_kategori','=','k.id_kategori')
        // agar bisa dipakai
        ->select('a.judul_artikel','a.created_at','a.gambar_artikel','u.name','k.nama_kategori as kategori','a.id_artikel')
        ->where('a.id_user',Auth::user()->id)->get();
        return view('admin.artikel.v_artikel',compact('artikel'));
    }

    public function tambah(){
        // agar saat select di form mucul data
        $kategori=DB::table('kategori')->orderBy('nama_kategori')->get();
        return view('admin.artikel.v_tambahArtikel',compact('kategori'));
    }

    public function tambahArtikel(){
        Request()->validate([
            'judul_artikel'=> 'required',
            'isi_artikel' => 'required',
            'gambar_artikel'=>'mimes:jpg,bmp,png,jpeg',
            'id_kategori'=>'required',
        ],[
            'judul_artikel.required' =>'Wajib diisi',
            'isi_artikel.required' =>'Wajib diisi',
            'id_kategori.required' =>'Wajib diisi',
            'gambar_artikel.mimes' =>'Wajib jpg,bmp,png,jpeg',
        ]);
        // jika foto siswa tidak kosong/ada
        if(Request()->gambar_artikel<>""){
            $file=Request()->gambar_artikel;
            $fileName=Request()->judul_artikel.'.'.$file->extension();
            $file->move(public_path('foto_artikel'),$fileName);

            $data=[
                'judul_artikel'=>Request()->judul_artikel,
                'isi_artikel'=>Request()->isi_artikel,
                'id_kategori'=>Request()->id_kategori,
                'id_user'=>Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'gambar_artikel'=>$fileName,
            ];
        }else{
            $data=[
                'judul_artikel'=>Request()->judul_artikel,
                'isi_artikel'=>Request()->isi_artikel,
                'id_kategori'=>Request()->id_kategori,
                'id_user'=>Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
                ];
        }
        
        DB::table('artikel')->insert($data);
        return redirect('/admin/artikel')->with('pesan','Tambah Artikel Berhasil');
    }

    public function edit($id_artikel){
        $artikel = DB::table('artikel')->where('id_artikel',$id_artikel)->first();
        $kategori=DB::table('kategori')->orderBy('nama_kategori')->get();


        return view('admin.artikel.v_editArtikel',compact('kategori','artikel'));
    }

    public function editProsesArtikel($id_artikel){
        Request()->validate([
            'judul_artikel'=> 'required',
            'isi_artikel' => 'required',
            'gambar_artikel'=>'mimes:jpg,bmp,png,jpeg',
            'id_kategori'=>'required',
        ],[
            'judul_artikel.required' =>'Wajib diisi',
            'isi_artikel.required' =>'Wajib diisi',
            'id_kategori.required' =>'Wajib diisi',
            'gambar_artikel.mimes' =>'Wajib jpg,bmp,png,jpeg',
        ]);

        
        
        // jika foto siswa tidak kosong/ada
        if(Request()->gambar_artikel<>""){
            $file=Request()->gambar_artikel;
            $fileName=Request()->judul_artikel.'.'.$file->extension();
            $file->move(public_path('foto_artikel'),$fileName);

            $data=[
                'judul_artikel'=>Request()->judul_artikel,
                'isi_artikel'=>Request()->isi_artikel,
                'id_kategori'=>Request()->id_kategori,
                'id_user'=>Auth::user()->id,
                'updated_at'=>date('Y-m-d H:i:s'),
                'gambar_artikel'=>$fileName,
            ];
        }else{
            $data=[
                'judul_artikel'=>Request()->judul_artikel,
                'isi_artikel'=>Request()->isi_artikel,
                'id_kategori'=>Request()->id_kategori,
                'id_user'=>Auth::user()->id,
                'updated_at'=>date('Y-m-d H:i:s'),
            ];
        }
       
        DB::table('artikel')->where('id_artikel',$id_artikel)->update($data);
        return redirect('/admin/artikel')->with('pesan','Update Artikel Berhasil');
    }

    public function hapus($id_artikel){
        $artikel=DB::table('artikel')->where('id_artikel',$id_artikel)->first();
        if($artikel<>""){
            unlink(public_path('foto_artikel').'/'.$artikel->gambar_artikel);
        }
        DB::table('artikel')->where('id_artikel',$id_artikel)->delete();

        return redirect('/admin/artikel')->with('pesan','Hapus Artikel Berhasil');
    }
}
