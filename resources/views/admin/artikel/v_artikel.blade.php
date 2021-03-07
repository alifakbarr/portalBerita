@extends('admin.layouts.v_dashboardAdmin')
@section('title','Artikel')
@section('content')
<a href="/admin/artikel/tambah" class="btn btn-primary">Tambah</a>
<table id="example2" class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>No</th>
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
      <td>{{ $art->judul_artikel }}</td>
      <td>{{ $art->name }}</td>
      <td>{{ $art->created_at }}</td>
      <td>
        <a href="/admin/kategori/edit/{{ $kgr->id_kategori }}" class="btn btn-warning">Edit</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $kgr->id_kategori }}">
          Hapus
        </button>
      </td>
      
    </tr>
    @php ($no++)
  @endforeach
  
</table>
@endsection