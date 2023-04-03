@extends('layouts.template')

@section('konten')
<main class="form-signin w-100 m-auto">
    @include('layouts.komponen.pesan')
    <form action="changepassword" method="post">
        @csrf
        <h1 class="h3 mb-2 fw-normal text-center">Ganti password anda</h1>

        <div class="form-floating">
            <input type="password" name="muserPwd" class="form-control @error('muserPwd') is-invalid
            @enderror required" id="muserPwd" placeholder="Password" required>
            <label for="muserPwd">Password Baru</label>
            @error('muserPwd')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" name="muserPwdconfirm" class="form-control @error('muserPwdconfirm') is-invalid
            @enderror required" id="muserPwdconfirm" placeholder="Password" required>
            <label for="muserPwdconfirm">Konfirmasi password baru</label>
            @error('muserPwd')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button class="w-100 mt-4 btn btn-lg btn-primary" type="submit">Ganti Password</button>
        <p class="my-3 text-center text-muted">&copy; 2023</p>
    </form>
</main>
@endsection
