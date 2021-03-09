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
      <td>{{ $art->created_at }}</td>
      <td>
        {{-- <a href="/admin/kae/edit/{{ $art->id_artikel }}" class="btn btn-warning">Edit</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $art->id_artikel }}">
          Hapus
        </button> --}}
      </td>
      
    </tr>
    @php ($no++)
  @endforeach
  
</table>
@endsection