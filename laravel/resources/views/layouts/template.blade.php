<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="{{ asset('css/sidebars.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            @include('layouts.komponen.navbar')
        </div>
        <div class="row box bg-light">
            <div class="col-lg-2 sidebars">
                @include('layouts.komponen.sidebars')
            </div>
            <div class="col-lg-10 bg-light p-2">
                <main>
                    @include('layouts.komponen.pesan')
                    @yield('konten')
                </main>
            </div>
        </div>
    </div>

    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('js/sidebars.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/opentab.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/detail.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/edittgd.js') }}"></script>
</body>

</html>
