<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();

        $this->middleware('auth');
    }
    public function index(){
        // as /inisial
        $kategori = DB::table('kategori as k')->join('users as u','k.id_user','=','u.id')
        // fungsi select agar ddapat digunakan
        ->select('k.nama_kategori','u.name','k.created_at','k.id_kategori')->get();
        // $data = ['kategoris'=>$this->KategoriModel->tampilKategori];
        return view('admin.kategori.v_kategori',compact('kategori'));
    }

    public function tambah(){
        return view('admin.kategori.v_tambahKategori');
    }

    public function prosesTambah(Request $request){
        // validasi
       // validasi
        Request()->validate([
            'nama_kategori'=>'required|unique:kategori,nama_kategori'
        ],
        [
            'nama_kategori.required'=>' Wajib di isi',
            'nama_kategori.unique'=>'Kategori sudah ada'
        ]);

        // setiap yang diinput di form masuk kesini
        $namaKategori = $request->nama_kategori;

        DB::table('kategori')->insert([
            'nama_kategori'=>$namaKategori,
            'id_user'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        
        return redirect('admin/kategori')->with('pesan','Kategori Berhasil Ditambah');
    }

    public function edit($id_kategori){
        $kategori=DB::table('kategori')->where('id_kategori',$id_kategori)->first();

        return view('admin..kategori.v_edit',compact('kategori'));
    }

    public function editProses(Request $request,$id_kategori){
        // validasi
        Request()->validate([
            'nama_kategori'=>'required|unique:kategori,nama_kategori'
        ],
        [
            'nama_kategori.required'=>' Wajib di isi',
            'nama_kategori.unique'=>'Kategori sudah ada'
        ]);
        DB::table('kategori')->where('id_kategori',$id_kategori)->update([
            // setiap yang diinput di form masuk kesini
            'nama_kategori' => $request->nama_kategori,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/admin/kategori')->with('pesan','Update Berhasil');
        
    }

    public function hapus($id_kategori){
        DB::table('kategori')->where('id_kategori',$id_kategori)->delete();

        return redirect('/admin/kategori')->with('pesan','Kategori Sukses dihapus');
    }
}
