@extends('layouts.template')
<!-- START FORM -->
@section('konten')
<div class="mb-2 p-3 bg-body rounded shadow-sm">
    <form action='{{ url('jbt') }}' method='post'>
        @csrf
        <a href="{{ url('jbt') }}" class="btn btn-secondary mb-2">
            Kembali </a>
                <div class="mb-3 row">
                    <label for="jbt" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='jbt' value="{{ Session::get('jbt') }}" id="jbt" maxlength="15">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='name' value="{{ Session::get('name') }}"
                            id="name" maxlength="100">
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
