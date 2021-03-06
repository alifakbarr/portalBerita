@extends('admin.layouts.v_dashboardAdmin')
@section('title','Kategori')
@section('content')
<a href="/admin/kategori/tambah" class="btn btn-primary">Tambah</a>
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>No</th>
      <th>Nama Kategori</th>
      <th>ID User</th>
      <th>Created At</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @php ($no=1)
    @foreach ($kategori as $kgr)
    <tr>
        <td>{{ $no }}</td>
        <td>{{ $kgr->nama_kategori }}</td>
        <td>{{ $kgr->name }}</td>
        <td>{{ $kgr->created_at }}</td>
        <td><a href="/admin/kategori/edit/{{ $kgr->id_kategori }}" class="btn btn-warning">Edit</a></td>
      </tr>
      @php ($no++)
    @endforeach
    
  </table>
</div>
<!-- /.box-body -->
</div>

@endsection