@extends('layouts.v_template')
@section('title','Home')
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
    @foreach ($artikel as $art)
    <tr>
      <th scope="row">{{ $no }}</th>
      {{-- <td>{{$no}}</td> --}}
      <td><img src="{{ url('foto_artikel'.'/'.$art->gambar_artikel) }}" width="50"></td>
      <td><a href="/artikel/detailArtikel/{{ $art->id_artikel }}">{{ $art->judul_artikel }}</a></td>
      <td>{!! substr($art->isi_artikel,0,400) !!}  ....</td>
      <td>{{ date('d-M-Y',strtotime($art->created_at)) }}</td>
      <td>{{ $art->kategori }}</td>

    </tr>
    @php ($no++)
    @endforeach
  </tbody>
</table>
@endsection