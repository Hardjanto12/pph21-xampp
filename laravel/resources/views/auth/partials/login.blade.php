@extends('auth.index')

@section('konten')
<main class="form-signin w-100 m-auto">
    @include('layouts.komponen.pesan')
    <form action="{{ url('login') }}" method="post">
        @csrf
        <h1 class="h3 my-3 fw-normal text-center">Silahkan Login</h1>

        <div class="form-floating">
            <input type="text" name="muserName" class="form-control @error('muserName') is-invalid
            @enderror required" id="muserName" placeholder="muserName" value="{{ old('muserName') }}" autofocus required>
            <label for="muserName">Username</label>
            @error('muserName')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" name="muserPwd" class="form-control @error('muserPwd') is-invalid
            @enderror required" id="muserPwdlogin" placeholder="muserPwd" required>
            <label for="muserPwd">Password</label>
            @error('muserPwd')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button class="w-100 mt-4 btn btn-lg btn-primary" type="submit">Login</button>
        <p class="my-3 text-center text-muted">&copy; 2023</p>
    </form>
</main>
@endsection
