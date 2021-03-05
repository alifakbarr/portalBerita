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
        $kategori = DB::table('kategori')->join('users','kategori.id_user','=','users.id')
        ->select('kategori.nama_kategori','users.name','kategori.created_at')->get();
        // $data = ['kategoris'=>$this->KategoriModel->tampilKategori];
        return view('admin.kategori.v_kategori',compact('kategori'));
    }

    public function tambah(){
        return view('admin.kategori.v_tambahKategori');
    }

    public function prosesTambah(Request $request){
        // validasi
        $this->validate($request,[
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
        
        return redirect('admin/kategori');
    }
}
