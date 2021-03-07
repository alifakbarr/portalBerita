@extends('admin.layouts.v_dashboardAdmin')
@section('title','Tambah Artikel')
@section('content')
<form role="form" method="post" action="/admin/artikel/tambahProses" enctype="multipart/form-data">
  @csrf
  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Judul</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="judul_atikel" placeholder="Masukkan Judul">
    </div>
    <textarea name="isi_artikel"  cols="30" rows="10"></textarea>
    <div class="form-group">
      <label for="exampleInputFile">Foto</label>
      <input type="file" name="gambar_artikel" id="exampleInputFile">
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection