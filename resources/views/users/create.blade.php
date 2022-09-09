@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
<h1 class="m-0 text-dark">Tambah User</h1>
@stop
@section('content')
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputNIS">NIS/NIP/NUPTK</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputNIS"
                            placeholder="NIS/NIP/NUPTK" name="nis" value="{{old('nis')}}">
                        @error('nis') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control
@error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name"
                            value="{{old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email
                            address</label>
                        <input type="email" class="form-control
@error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                            value="{{old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control
@error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi
                            Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword"
                            placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputlevel">Level</label>
                        <select class="form-control @error('level') is-invalid @enderror" id="exampleInputlevel"
                            name="level">
                            <option value="admin" @if(old('level')=='admin' )selected @endif>Admin</option>
                            <option value="bendahara" @if(old('level')=='bendahara' )selected @endif>Bendahara</option>
                            <option value="guru" @if(old('level')=='guru' )selected @endif>Guru</option>
                            <option value="kepsek" @if(old('level')=='kepsek' )selected @endif>Kepala Sekolah</option>
                            <option value="siswa" @if(old('level')=='siswa' )selected @endif>Siswa</option>
                        </select>
                        @error('level') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop