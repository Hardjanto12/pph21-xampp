@extends('layouts.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url('cbg') }}' method='post'>
    @csrf
    <div class="mb-2 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('cbg') }}" class="btn btn-secondary mb-2">Kembali</a>
        <div class="mb-3 row">
            <label for="cbg" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='cbg' value="{{ Session::get('cbg') }}" id="cbg" maxlength="15">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{ Session::get('name') }}" id="name" maxlength="100">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name='alamat' value="{{ Session::get('alamat') }}" id="alamat" maxlength="200"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kel" class="col-sm-2 col-form-label">Kelurahan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kel' value="{{ Session::get('kel') }}" id="kel" maxlength="100">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kec" class="col-sm-2 col-form-label">Kecamatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kec' value="{{ Session::get('kec') }}" id="kec" maxlength="100">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kota" class="col-sm-2 col-form-label">Kota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kota' value="{{ Session::get('kota') }}" id="kota" maxlength="100">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="prov" class="col-sm-2 col-form-label">Provinsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='prov' value="{{ Session::get('prov') }}" id="prov" maxlength="100">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="umk" class="col-sm-2 col-form-label">UMK</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='umk' value="{{ Session::get('umk') }}" id="umk" maxlength="18">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection
<!-- AKHIR FORM -->
