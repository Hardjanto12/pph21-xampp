<tbody>
    <tr>
        <td>Kode</td>
        <td>{{ $data->cbg }}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>{{ $data->alamat }}</td>
    </tr>
    <tr>
        <td>Kelurahan</td>
        <td>{{ $data->kel }}</td>
    </tr>
    <tr>
        <td>Kecamatan</td>
        <td>{{ $data->kec }}</td>
    </tr>
    <tr>
        <td>Kota</td>
        <td>{{ $data->kota }}</td>
    </tr>
    <tr>
        <td>Provinsi</td>
        <td>{{ $data->prov }}</td>
    </tr>
    <tr>
        <td>UMK</td>
        <td>@rupiah($data->umk)</td>
    </tr>
</tbody>
{{-- <tbody>
    <tr>
        @foreach ($kolom as $namakolom)
        <td>{{ $namakolom }}</td>
        @endforeach
        @foreach ($data as $item)
        <td>{{ $item }}</td>
        @endforeach
    </tr> --}}
