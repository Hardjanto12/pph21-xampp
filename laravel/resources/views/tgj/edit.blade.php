@extends('layouts.template')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('tgj/' . $data->nojnl) }}' method='post'>
        @csrf
        <div class="mb-2 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('tgj') }}" class="btn btn-secondary mb-2">Kembali</a>
            <div class="mb-2 p-3 rounded shadow-sm bg-success text-white">
                <div class="row">
                    <label for="nojnl" class="col-sm-1 col-form-label sm-form-label">Kode</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name='nojnl'
                            value="{{ trim($data->nojnl) }}" id="nojnl" placeholder="Kode" aria-label="Kode"
                            aria-describedby="nojnl" @error('nojnl') is-invalid @enderror disabled>
                        <div class="invalid-feedback">
                            Kode tidak boleh kosong.
                        </div>
                    </div>
                    <label for="date" class="col-sm-1 col-form-label sm-form-label">Tanggal</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control form-control-sm" name='date'
                            value="{{ trim($data->date) }}" id="date" placeholder="Tanggal" aria-label="Tanggal"
                            aria-describedby="kode" @error('date') is-invalid @enderror required>
                        <div class="invalid-feedback">
                            Tanggal tidak boleh kosong.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="kry" class="col-sm-1 col-form-label">Karyawan</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Karyawan"
                                aria-label="Karyawan" aria-describedby="Karyawan" name="kry"
                                value="{{ trim($data->kry) }}" id="inputkry" @error('kry') is-invalid @enderror required>
                            <button class="btn btn-outline-light btn-sm" onclick="kryFunction()" type="button"
                                id="btnkry">Pilih</button>
                        </div>
                        <div class="invalid-feedback">
                            Karyawan tidak boleh kosong.
                        </div>
                    </div>
                    <label for="nik" class="col-sm-1 col-form-label">NIK</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="NIK" aria-label="NIK"
                                aria-describedby="NIK" name="nik" value="{{ trim($data->nik) }}" id="inputnikkry"
                                @error('nik') is-invalid @enderror required>
                        </div>
                        <div class="invalid-feedback">
                            NIK tidak boleh kosong.
                        </div>
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">Nama</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Nama" aria-label="Nama"
                                aria-describedby="Nama" name="name" value="{{ trim($data->name) }}" id="inputnamekry"
                                @error('name') is-invalid @enderror required>
                        </div>
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong.
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                </div>
            </div>
        </div>
    </form>

    <form action="/tgdedit/edit" method="post">
        <div class="mb-2 p-3 bg-body rounded shadow-sm">
            @csrf
            <input type="hidden" name="nojnltgd" value="{{ trim($data->nojnl) }}" <div class="row">
            <div class="row">
                <label for="mgj" class="col-sm-2 col-form-label">Penghasilan</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Penghasilan"
                            aria-label="Penghasilan" aria-describedby="mgj" name="mgj" id="inputmgj"
                            @error('mgj') is-invalid @enderror required>
                    </div>
                    <div class="invalid-feedback">
                        Penghasilan tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="mgjname" class="col-sm-2 col-form-label">Nama Penghasilan</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Nama Penghasilan"
                            aria-label="Nama Penghasilan" aria-describedby="mgjname" name="mgjname" id="inputmgjname"
                            @error('mgjname') is-invalid @enderror required>
                    </div>
                    <div class="invalid-feedback">
                        Nama Penghasilan tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="mgjktg" class="col-sm-2 col-form-label">Kategori Penghasilan</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Kategori Penghasilan"
                            aria-label="Kategori Penghasilan" aria-describedby="mgjktg" name="mgjktg" id="inputmgjktg"
                            @error('mgjktg') is-invalid @enderror required>
                    </div>
                    <div class="invalid-feedback">
                        Kategori Penghasilan tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="umk" class="col-sm-2 col-form-label">UMK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" placeholder="UMK" aria-label="UMK"
                        aria-describedby="umk" name="umk" id="umk"
                        @error('umk')
                is-invalid @enderror required>
                    <div class="invalid-feedback">
                        UMK tidak boleh kosong.
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                </div>
            </div>
        </div>
    </form>

    <div class="mb-2 p-3 bg-body rounded shadow-sm">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Penghasilan</th>
                        <th scope="col">Nama Penghasilan</th>
                        <th scope="col">Kategori Penghasilan</th>
                        <th scope="col">UMK</th>
                        <th scope="col">Tool</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tgd as $tg)
                        <tr class="">
                            <td>{{ $tg->mgj }}</td>
                            <td>{{ $tg->name }}</td>
                            <td>{{ $tg->ktg }}</td>
                            <td>@rupiah($tg->umk)</td>
                            <td>
                                <a class="btn btn-warning btn-sm"
                                    onclick="editTgd([
                                        '{{ trim($tg->mgj) }}',
                                        '{{ trim($tg->name) }}',
                                        '{{ trim($tg->ktg) }}',
                                        '{{ trim($tg->umk) }}'])"
                                    id="btnSelect">Edit Data</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a href="{{ url('tgj') }}" <div class="col-sm-10"><button type="submit" class="btn btn-primary"
                    name="submit">Simpan</button>
            </a>
        </div>
    </div>
    </form>
@endsection
<!-- AKHIR FORM -->
