<tbody>
    <tr>
        <td>Kode</td>
        <td>{{ $data->kry }}</td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>{{ $data->nik }}</td>
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
        <td>Kota</td>
        <td>{{ $data->kota }}</td>
    </tr>
    <tr>
        <td>Kecamatan</td>
        <td>{{ $data->kec }}</td>
    </tr>
    <tr>
        <td>Kelurahan</td>
        <td>{{ $data->kel }}</td>
    </tr>
    <tr>
        <td>Provinsi</td>
        <td>{{ $data->prop }}</td>
    </tr>
    <tr>
        <td>Telepon</td>
        <td>{{ $data->telp }}</td>
    </tr>
    <tr>
        <td>Tanggal Mulai</td>
        <td>{{ \Carbon\Carbon::parse($data->awal)->format('d-M-Y') }}</td>
    </tr>
    <tr>
        <td>Tanggal Berhenti</td>
        <td>{{ \Carbon\Carbon::parse($data->akhir)->format('d-M-Y') }}</td>
    </tr>
    <tr>
        <td>Divisi</td>
        <td>{{ $data->dvs }}</td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>{{ $data->jbt }}</td>
    </tr>
    <tr>
        <td>Asuransi</td>
        <td>{{ $data->asr }}</td>
    </tr>
    <tr>
        <td>PTKP</td>
        <td>{{ $data->ptkp }}</td>
    </tr>
    <tr>
        <td>BPJS</td>
        <td>{{ $data->bpjs }}</td>
    </tr>
    <tr>
        <td>Cabang</td>
        <td>{{ $data->cbg }}</td>
    </tr>