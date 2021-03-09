@extends('layouts.v_template')
@section('title','test')
@section('content')
    <h1>{{ $artikel->judul_artikel }}</h1>
    <br>
    <b>{{ $artikel->created_at }}</b>
    <br>
    <b>{{ $artikel->kategori }}</b>
    <img src="{{ url('foto_artikel'.'/'.$artikel->gambar_artikel) }}" width="300">
    <p>{!! $artikel->isi_artikel !!}}</p>
@endsection