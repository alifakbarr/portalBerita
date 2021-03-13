@extends('layouts.v_template')
@section('title','kategori')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Judul</th>
      <th scope="col">Artikel</th>
      <th scope="col">Created</th>
      <th scope="col">Kategori</th>
    </tr>
  </thead>
  <tbody>
    @php ($no=1)
    @foreach ($data as $dat)
    <tr>
      <th scope="row">{{ $no }}</th>
      <td><img src="{{ url('foto_artikel'.'/'.$dat->gambar_artikel) }}" width="50"></td>
      <td><a href="/artikel/detailArtikel/{{ $dat->id_artikel }}">{{ $dat->judul_artikel }}</a></td>
      <td>{!! substr($dat->isi_artikel,0,400) !!}  ....</td>
      <td>{{ date('d-M-Y',strtotime($dat->created_at)) }}</td>
      <td>{{ $dat->kategori }}</td>

    </tr>
    @php ($no++)
    @endforeach
  </tbody>
</table>
@endsection