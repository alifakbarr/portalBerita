@extends('admin.layouts.v_dashboardAdmin')
@section('title','Kategori')
@section('content')
<a href="/admin/kategori/tambah" class="btn btn-primary">Tambah</a>
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
        <h4><i class="icon fa fa-check"></i>Success</h4>
        {{ session('pesan') }}        
    </div>
@endif
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
</div>
<!-- /.box-body -->
</div>

{{-- Modal --}}
@foreach ($kategori as $kgr)
<div class="modal modal-danger fade" id="hapus{{ $kgr->id_kategori }}" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Hapus Kategori</h4>
      </div>
      <div class="modal-body">
        <p>apakah anda yakin ingin menghapus {{ $kgr->nama_kategori }}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
        <a href="/admin/kategori/hapus/{{ $kgr->id_kategori }}" class="btn btn-outline">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

@endsection