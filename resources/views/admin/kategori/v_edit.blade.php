@extends('admin.layouts.v_dashboardAdmin')
@section('title','Edit Kategori')
@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Kategori</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="post" action="/admin/kategori/prosesEdit/{{ $kategori->id_kategori }}">
      @csrf
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Kategori</label>
        <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kategori">
        @error('nama_kategori')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection