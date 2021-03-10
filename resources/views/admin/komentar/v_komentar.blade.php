@extends('admin.layouts.v_dashboardAdmin')
@section('title','Manager Komentar')
@section('content')
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
        <h4><i class="icon fa fa-check"></i>Success</h4>
        {{ session('pesan') }}        
    </div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Email</th>
      <th scope="col">Komentar</th>
      <th scope="col">Created At</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php ($no=1)
    @foreach ($komentar as $km)
    <tr>
      <th scope="row">{{ $no }}</th>
      <td>{{ $km->judul_artikel }}</td>
      <td>{{ $km->email }}</td>
      <td>{{ $km->komentar }}</td>
      <td>{{ $km->created_at }}</td>
      <td>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $km->id_komentar }}">
          Hapus
        </button>
      </td>
    </tr>
    @php ($no++)
    @endforeach
    
    
  </tbody>
</table>

@foreach ($komentar as $km)
<div class="modal modal-danger fade" id="hapus{{ $km->id_komentar }}" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Hapus Kategori</h4>
      </div>
      <div class="modal-body">
        <p>apakah anda yakin ingin menghapus komentar dari {{ $km->email }}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
        <a href="/admin/komentar/hapus/{{ $km->id_komentar }}" class="btn btn-outline">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

@endsection