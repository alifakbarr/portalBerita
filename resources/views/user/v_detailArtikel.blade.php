@extends('layouts.v_template')
@section('title',)
    {{$artikel->judul_artikel}}
@endsection
@section('content')
    <h1>{{ $artikel->judul_artikel }}</h1>
    <br>
    <b>{{ $artikel->created_at }}</b>
    <b>penulis : {{ $artikel->name }}</b>
    <br>
    <b>{{ $artikel->kategori }}</b>
    <img src="{{ url('foto_artikel'.'/'.$artikel->gambar_artikel) }}" width="300">
    <p>{!! $artikel->isi_artikel !!}</p>

    <hr>

    <h3>{{ $hitung }} komentar</h3>
    <hr>
    @foreach ($komentar as $km)
    <b>{{ date('d-M-Y H:i',strtotime($km->created_at)) }}</b>
    <p>email : {{ $km->email }}</p>
    <p>komentar : {{ $km->komentar }}</p>
    @endforeach
    

    <form action="/artikel/komentar/{{ $artikel->id_artikel }}" method="POST" class="form-control">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="komentar" rows="3"></textarea>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
@endsection