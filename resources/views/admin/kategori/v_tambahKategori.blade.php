@extends('admin.layouts.v_dashboardAdmin')
@section('title')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Ketegori</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="/admin/kategori/prosesTambah">
        @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Kategori</label>
          <input type="text" name="nama_kategori" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kategori">
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection