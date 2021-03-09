@extends('layouts.v_template')
@section('title','wwwoooy')
@section('content')
    djakmasm
    
        <table border="1">
          <tr>
            <th>gambar</th>
            <th>Judul</th>
            <th>Artikel</th>
            <th>Created</th>
            <th>kategori</th>
          </tr>
          @foreach ($artikel as $art)
          <tr>
            <td><img src="{{ url('foto_artikel'.'/'.$art->gambar_artikel) }}" width="50"></td>
            <td>{{ $art->judul_artikel }}</td>
            <td>{!! substr($art->isi_artikel,0,400) !!}  ....</td>
            <td>{{ date('d-M-Y',strtotime($art->created_at)) }}</td>
            <td>{{ $art->kategori }}</td>
          </tr>
          @endforeach
        </table>
@endsection