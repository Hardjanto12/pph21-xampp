<tbody>
    <tr>
        <td>Kode</td>
        <td>{{ $data->bpjs }}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <td>Tanggal Awal</td>
        {{-- <td>{{ $data->awal }}</td> --}}
        <td>{{ \Carbon\Carbon::parse($data->awal)->format('d-M-Y') }}</td>
    </tr>
    <tr>
        <td>Tanggal Akhir</td>
        {{-- <td>{{ $data->akhir }}</td> --}}
        <td>{{ \Carbon\Carbon::parse($data->akhir)->format('d-M-Y') }}</td>
    </tr>
    <tr>
        <td>Tarif</td>
        <td>{{ $data->tarif }}</td$data->
    </tr>
    <tr>
        <td>Penanggung</td>
        <td>{{ $data->penanggung }}</td>
    </tr>
    <tr>
        <td>Pengurang PPH</td>
        <td>{{ $data->pengurangpph21 }}</td>
    </tr>

{{-- <tbody>
    <tr>
        @foreach ($kolom as $namakolom)
        <td>{{ $namakolom }}</td>
        @endforeach
        @foreach ($data as $item)
        <td>{{ $item }}</td>
        @endforeach
    </tr> --}}
