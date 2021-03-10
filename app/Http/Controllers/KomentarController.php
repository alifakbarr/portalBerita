<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomentarController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $komentar = DB::table('komentar as k')
        ->join('artikel as a','k.id_artikel','=','a.id_artikel')
        ->select('a.judul_artikel','k.email','k.komentar','k.created_at','k.id_komentar')
        ->get();
        return view('admin.komentar.v_komentar',compact('komentar'));
    }

    public function hapus($id_komentar){
        DB::table('komentar')->where('id_komentar',$id_komentar)->delete();

        return redirect('/admin/komentar')->with('pesan','Hapus komentar berhasil');
    }
}
