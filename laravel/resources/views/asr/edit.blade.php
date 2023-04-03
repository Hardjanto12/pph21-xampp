@extends('layouts.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url('asr/' .$data->asr) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="mb-2 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('asr') }}" class="btn btn-secondary mb-2">
            Kembali</a>
                <div class="mb-3 row">
                    <label for="asr" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='asr' value="{{ $data->asr }}" id="asr" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='name' value="{{ trim($data->name) }}" id="name" maxlength="100">
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
