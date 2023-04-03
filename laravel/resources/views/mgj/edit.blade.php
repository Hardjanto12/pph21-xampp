@extends('layouts.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url('mgj/' .$data->mgj) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="mb-2 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('mgj') }}" class="btn btn-secondary mb-2">Kembali</a>
        <div class="mb-3 row">
            <label for="mgj" class="col-sm-2 col-form-label form-label">Kode</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='mgj' value="{{ trim($data->mgj) }}" id="mgj" placeholder="Kode" aria-label="Kode" aria-describedby="kode" @error('mgj') is-invalid @enderror
                    required disabled>
                <div class="invalid-feedback">
                    Kode tidak boleh kosong.
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="name"
                    name="name" value="{{ trim($data->name) }}" id="name" @error('name') is-invalid @enderror
                    required>
                <div class="invalid-feedback">
                    Nama tidak boleh kosong.
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="ktg" class="col-sm-2 col-form-label">Kategori Penghasilan</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Kategori Penghasilan" aria-label="kategoripenghasilan"
                        aria-describedby="kategoripenghasilan" name="ktg" value="{{ trim($data->ktg) }}" id="inputktg" @error('ktg')
                        is-invalid @enderror required>
                    <button class="btn btn-outline-primary" onclick="ktgFunction()" type="button" id="btnktg">Pilih</button>
                </div>
                <div class="invalid-feedback">
                    Kategori Penghasilan tidak boleh kosong.
                </div>
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
