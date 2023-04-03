@extends('layouts.template')
<!-- START FORM -->
@section('konten')
<div class="mb-2 p-3 bg-body rounded shadow-sm">
    <form action='{{ url('ptkp/' .trim($data->ptkp)) }}' method='post'>
        @csrf
        @method('PUT')
        <a href="{{ url('ptkp') }}" class="btn btn-secondary mb-2">
            Kembali </a>

        <div class="mb-3 row">
            <label for="ptkp" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='ptkp' value="{{ trim($data->ptkp) }}" id="ptkp"
                    maxlength="15" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{ trim($data->name) }}" id="name"
                    maxlength="100">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="val" class="col-sm-2 col-form-label">Nominal</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='val' value="{{ trim($data->val) }}" id="val"
                    maxlength="18">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="val2" class="col-sm-2 col-form-label">Nominal Per Hari</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='val2' value="{{ trim($data->val2) }}" id="val2"
                    maxlength="18">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="awal" class="col-sm-2 col-form-label">Tanggal Awal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='awal' value="{{ trim($data->awal) }}" id="awal">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="akhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='akhir' value="{{ trim($data->akhir) }}" id="akhir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="grup" class="col-sm-2 col-form-label">Grup</label>
            <div class="col-sm-10">
                <select class="form-select" name="grup" id="grup" value="{{ $data->grup }}">
                    <option {{ $data->grup == '' ? 'selected' : '' }}>Pilih</option>
                    <option value="1" {{ $data->grup == '1' ? 'selected' : '' }}>Tetap</option>
                    <option value="2" {{ $data->grup == '2' ? 'selected' : '' }}>Tidak tetap</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </form>
</div>
@endsection
<!-- AKHIR FORM -->