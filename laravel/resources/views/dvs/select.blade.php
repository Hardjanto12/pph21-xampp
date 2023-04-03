<!doctype html>
<html lang="en">

<head>
    <title>Pilih Divisi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <main>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <!-- FORM PENCARIAN -->
                        <div class="pb-3">
                            <form class="d-flex" action="{{ url('dvs/selectdvs') }}" method="get">
                                <input class="form-control me-1" type="search" name="katakunci"
                                    value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci"
                                    aria-label="Search">
                                <button class="btn btn-md btn-secondary" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-small text-center">
                <thead class="table-dark">
                    <tr>
                        <th class="col-md-1">No.</th>
                        <th class="col-md-4">Kode</th>
                        <th class="col-md-4">Nama</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->dvs }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" onclick="selectDvs('{{ trim($item->dvs) }}')" id="btnSelect">Select</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
        </div>
        <!-- AKHIR DATA -->
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        function selectDvs(dvsdata) {
            window.opener.popupCallbackdvs(dvsdata); //Call callback function
            window.close(); // Close the current popup
        }
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
</body>

</html>
