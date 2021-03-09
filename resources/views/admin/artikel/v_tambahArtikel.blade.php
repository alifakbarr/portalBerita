@extends('admin.layouts.v_dashboardAdmin')
@section('title','Tambah Artikel')
@section('content')
<form role="form" method="post" action="/admin/artikel/tambahArtikel" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id_artikel">
  <div class="box-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Judul</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="judul_artikel" placeholder="Masukkan Judul">
      @error('judul_artikel')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label>Pilih Kategori :</label>
      <select name="id_kategori" class="form-control">
        <option selected disabled>Pilih</option>
        @foreach ($kategori as $kgr)
            
        <option value="{{ $kgr->id_kategori }}">{{ $kgr->nama_kategori }}</option>
        @endforeach
      </select>
      @error('id_kategori')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="box">
      <div class="box-body pad">
              <textarea id="editor1" name="isi_artikel" rows="10" cols="80"></textarea> 
      </div>
      @error('isi_artikel')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
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