@extends('admin.layouts.v_dashboardAdmin')
@section('title','Tambah Artikel')
@section('content')
<form role="form" method="post" action="/admin/artikel/tambahArtikel" enctype="multipart/form-data">
  @csrf
  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Judul</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="judul_artikel" placeholder="Masukkan Judul">
    </div>

    <div class="form-group">
      <label>Pilih Kategori :</label>
      <select name="id_kategori" class="form-control">
        @foreach ($kategori as $kgr)
            
        <option value="{{ $kgr->id_kategori }}">{{ $kgr->nama_kategori }}</option>
        @endforeach
      </select>
    </div>

    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">CK Editor
          <small>Advanced and full of features</small>
        </h3>
      </div>
      <div class="box-body pad">
              <textarea id="editor1" name="isi_artikel" rows="10" cols="80"></textarea> 
      </div>
    </div>
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