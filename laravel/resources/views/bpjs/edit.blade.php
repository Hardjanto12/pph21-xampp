@extends('layouts.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url('bpjs/'.$data->bpjs) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="mb-2 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('bpjs') }}" class="btn btn-secondary mb-2">
            Kembali</a>
        <div class="mb-3 row">
            <label for="bpjs" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='bpjs' value="{{ $data->bpjs }}" id="bpjs" disabled>
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
            <label for="awal" class="col-sm-2 col-form-label">Tanggal Awal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='awal' value="{{ $data->awal }}" id="awal">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="akhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='akhir' value="{{ $data->akhir }}" id="akhir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tarif" class="col-sm-2 col-form-label">Tarif</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='tarif' value="{{ $data->tarif }}" id="tarif">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penanggung" class="col-sm-2 col-form-label">Penanggung Biaya</label>
            <div class="col-sm-10">
                <select class="form-select" name="penanggung" id="penanggung" value="{{ Session::get('penanggung') }}">
                    <option {{ trim($data->penanggung) == '' ? 'selected' : '' }}>Pilih</option>
                    <option value="Perusahaan" {{ trim($data->penanggung) == 'Perusahaan' ? 'selected' : '' }}>Perusahaan
                    </option>
                    <option value="Karyawan" {{ trim($data->penanggung) == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pengurangpph21" class="col-sm-2 col-form-label">Pengurangan PPH</label>
            <div class="col-sm-10">
                <select class="form-select" name="pengurangpph21" id="pengurangpph21"
                    value="{{ Session::get('pengurangpph21') }}">
                    <option {{ trim($data->pengurangpph21) == '' ? 'selected' : '' }}>Pilih</option>
                    <option value="Yes" {{ trim($data->pengurangpph21) == 'Yes' ? 'selected' : '' }}>Ya</option>
                    <option value="No" {{ trim($data->pengurangpph21) == 'No' ? 'selected' : '' }}>Tidak</option>
                </select>
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