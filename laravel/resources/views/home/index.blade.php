@extends('layouts.template')
@section('konten')
<main>
    <div class="col-6 p-2">
        <h1 class="display-3">
            @auth
            Login sukses!
            Selamat datang,
            <strong>
                {{ $userID }}
            </strong>
            @endauth
        </h1>
    </div>


</main>
@endsection
