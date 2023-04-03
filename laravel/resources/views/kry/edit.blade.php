@extends('layouts.template')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('kry/' . $data->kry) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="mb-2 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('kry') }}" class="btn btn-secondary mb-2">Kembali</a>
            <div class="row">
                <label for="kry" class="col-sm-2 col-form-label form-label">Kode</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" name='kry' value="{{ trim($data->kry) }}"
                        id="kry" placeholder="Kode" aria-label="Kode" aria-describedby="kode"
                        @error('kry') is-invalid
                    @enderror required disabled>
                    <div class="invalid-feedback">
                        Kode tidak boleh kosong.
                    </div>
                </div>
                <label for="nik" class="col-sm-1 col-form-label form-label">NIK</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" name='nik' value="{{ trim($data->nik) }}"
                        id="nik" placeholder="NIK" aria-label="NIK" aria-describedby="nik"
                        @error('nik') is-invalid
                    @enderror>
                    <div class="invalid-feedback">
                        NIK tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" placeholder="Nama" aria-label="Nama"
                        aria-describedby="name" name="name" value="{{ trim($data->name) }}" id="name"
                        @error('name')
                    is-invalid @enderror>
                    <div class="invalid-feedback">
                        Nama tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" placeholder="Alamat" aria-label="Alamat"
                        aria-describedby="alamat" name="alamat" value="{{ trim($data->alamat) }}" id="alamat"
                        @error('alamat') is-invalid @enderror>
                    <div class="invalid-feedback">
                        Alamat tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" placeholder="Kota" aria-label="Kota"
                        aria-describedby="kota" name="kota" value="{{ trim($data->kota) }}" id="kota"
                        @error('kota')
                    is-invalid @enderror>
                    <div class="invalid-feedback">
                        Kota tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="kel" class="col-sm-2 col-form-label">Kelurahan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm" placeholder="Kelurahan"
                        aria-label="Kelurahan" aria-describedby="kel" name="kel" value="{{ trim($data->kel) }}"
                        id="kel" @error('kel') is-invalid
                    @enderror>
                    <div class="invalid-feedback">
                        Kelurahan tidak boleh kosong.
                    </div>
                </div>
                <label for="kec" class="col-sm-1 col-form-label">Kecamatan</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-sm" placeholder="Kec" aria-label="Kec"
                        aria-describedby="kec" name="kec" value="{{ trim($data->kec) }}" id="kec"
                        @error('kec') is-invalid
                    @enderror>
                    <div class="invalid-feedback">
                        Kecamatan tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="prop" class="col-sm-2 col-form-label">Provinsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" placeholder="Provinsi"
                        aria-label="Provinsi" aria-describedby="prop" name="prop" value="{{ trim($data->prop) }}"
                        id="prop" @error('prop')
                    is-invalid @enderror>
                    <div class="invalid-feedback">
                        Provinsi tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="telp" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" placeholder="Telepon"
                        aria-label="Telepon" aria-describedby="telp" name="telp" value="{{ trim($data->telp) }}"
                        id="telp" @error('telp')
                    is-invalid @enderror>
                    <div class="invalid-feedback">
                        Telepon tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-select form-select-sm" name="gender" id="gender"
                        value="{{ Session::get('gender') }}">
                        <option {{ trim($data->gender) == '' ? 'selected' : '' }}>Pilih</option>
                        <option value="M" {{ trim($data->gender) == 'M' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="F" {{ trim($data->gender) == 'F' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <label for="awal" class="col-sm-2 col-form-label">Tanggal Awal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control form-control-sm" name='awal'
                        value="{{ trim($data->awal) }}" id="awal">
                </div>
                <label for="akhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control form-control-sm" name='akhir'
                        value="{{ trim($data->akhir) }}" id="akhir">
                </div>
            </div>


            <div class="row">
                <label for="dvs" class="col-sm-2 col-form-label">Divisi</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Divisi"
                            aria-label="Divisi" aria-describedby="divisi" name="dvs" value="{{ trim($data->dvs) }}"
                            id="inputdvs" @error('dvs')
                        is-invalid @enderror>
                        <button class="btn btn-outline-primary btn-sm" onclick="dvsFunction()" type="button"
                            id="btndvs">Pilih</button>
                    </div>
                    <div class="invalid-feedback">
                        Divisi tidak boleh kosong.
                    </div>
                </div>
                <label for="jbt" class="col-sm-1 col-form-label">Jabatan</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Jabatan"
                            aria-label="Jabatan" aria-describedby="jabatan" name="jbt"
                            value="{{ trim($data->jbt) }}" id="inputjbt"
                            @error('jbt')
                        is-invalid @enderror>
                        <button class="btn btn-outline-primary btn-sm" onclick="jbtFunction()" type="button"
                            id="btnjbt">Pilih</button>
                    </div>
                    <div class="invalid-feedback">
                        Jabatan tidak boleh kosong.
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="asr" class="col-sm-2 col-form-label">Asuransi</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Asuransi"
                            aria-label="Asuransi" aria-describedby="asuransi" name="asr"
                            value="{{ trim($data->asr) }}" id="inputasr" @error('asr') is-invalid @enderror>
                        <button class="btn btn-outline-primary btn-sm" onclick="asrFunction()" type="button"
                            id="btnasr">Pilih</button>
                    </div>
                    <div class="invalid-feedback">
                        Asuransi tidak boleh kosong.
                    </div>
                </div>
                <label for="ptkp" class="col-sm-1 col-form-label">PTKP</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="PTKP" aria-label="PTKP"
                            aria-describedby="ptkp" name="ptkp" value="{{ trim($data->ptkp) }}" id="inputptkp"
                            @error('ptkp') is-invalid @enderror>
                        <button class="btn btn-outline-primary btn-sm" onclick="ptkpFunction()" type="button"
                            id="btnptkp">Pilih</button>
                    </div>
                    <div class="invalid-feedback">
                        PTKP tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="cbg" class="col-sm-2 col-form-label">Cabang</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Cabang"
                            aria-label="Cabang" aria-describedby="cbg" name="cbg" value="{{ trim($data->cbg) }}"
                            id="inputcbg" @error('cbg')
                        is-invalid @enderror>
                        <button class="btn btn-outline-primary btn-sm" onclick="cbgFunction()" type="button"
                            id="btncbg">Pilih</button>
                    </div>
                    <div class="invalid-feedback">
                        Cabang tidak boleh kosong.
                    </div>
                </div>
                <label for="bpjs" class="col-sm-1 col-form-label">BPJS</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="BPJS" aria-label="BPJS"
                            aria-describedby="bpjs" name="bpjs" value="{{ trim($data->bpjs) }}" id="inputbpjs"
                            @error('bpjs') is-invalid @enderror>
                        <button class="btn btn-outline-primary btn-sm" onclick="bpjsFunction()" type="button"
                            id="btnbpjs">Pilih</button>
                    </div>
                    <div class="invalid-feedback">
                        BPJS tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="mgj" class="col-sm-2 col-form-label">Penghasilan</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Penghasilan"
                            aria-label="Penghasilan" aria-describedby="mgj" name="mgj" id="inputmgj"
                            @error('mgj')
                        is-invalid @enderror>
                        <button class="btn btn-outline-primary btn-sm" onclick="mgjFunction()" type="button"
                            id="btnmgj">Pilih</button>
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
                            @error('mgjname') is-invalid @enderror>
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
                            @error('mgjktg') is-invalid @enderror>
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
                        aria-describedby="umk" name="umk" value="{{ Session::get('umk') }}" id="umk"
                        @error('umk')
                    is-invalid @enderror>
                    <div class="invalid-feedback">
                        UMK tidak boleh kosong.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Tambah</button>
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
                    @foreach ($krd as $k)
                        <tr class="">
                            <td>{{ $k->mgj }}</td>
                            <td>{{ $k->name }}</td>
                            <td>{{ $k->ktg }}</td>
                            <td>@rupiah($k->umk)</td>
                            <td>
                                <form onsubmit="return confirm('Yakin akan menghapus data {{ trim($k->kry) }}?')"
                                    class="d-inline"
                                    action="{{ url('krdedit/delete/' . trim($k->kry) . '/' . trim($k->mgj)) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a href="{{ url('kry') }}">
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                </div>
            </a>
        </div>
    </div>
@endsection
<!-- AKHIR FORM -->
