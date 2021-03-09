@extends('admin.layouts.v_dashboardAdmin')
@section('title','Artikel')
@section('content')
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
        <h4><i class="icon fa fa-check"></i>Success</h4>
        {{ session('pesan') }}        
    </div>
@endif
<a href="/admin/artikel/tambah" class="btn btn-primary">Tambah</a>
<table id="example2" class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>No</th>
    <th>Foto</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Kategori</th>
    <th>Created At</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  @php ($no=1)
  @foreach ($artikel as $art)
  <tr>
      <td>{{ $no }}</td>
      <td><img src="{{ url('foto_artikel/'.$art->gambar_artikel) }}" width="100"></td>
      <td>{{ $art->judul_artikel }}</td>
      <td>{{ $art->name }}</td>
      <td>{{ $art->kategori }}</td>
      <td>{{ $art->created_at }}</td>
      <td>
        <a href="/admin/artikel/edit/{{ $art->id_artikel }}" class="btn btn-warning">Edit</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $art->id_artikel }}">
          Hapus
        </button>
      </td>
      
    </tr>
    @php ($no++)
  @endforeach
  
  {{-- modal --}}
  @foreach ($artikel as $art)
<div class="modal modal-danger fade" id="hapus{{ $art->id_artikel }}" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Hapus Artikel</h4>
      </div>
      <div class="modal-body">
        <p>apakah anda yakin ingin menghapus <b>{{ $art->judul_artikel }}</b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
        <a href="/admin/artikel/hapus/{{ $art->id_artikel }}" class="btn btn-outline">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
</table>
@endsection