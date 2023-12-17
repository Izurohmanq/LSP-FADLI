<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $datas->full_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .table2{
        margin-top: 300px;
        line-height: 100px;
    }
    .table2 .table2Body{
        margin-top: 90px;
    }
</style>
<body>
    <h1>Cetak PDF</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Alamat KTP</th>
                <th>Alamat Sekarang</th>
                <th>Kecamatan</th>
                <th>Kabupaten/Kota</th>
                <th>Provinsi</th>
                <th>NoHP</th>
                <th>Email</th>
                <th>Kewarganegaraan</th>
                <th>Kewarganegaraan Asing</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Gender</th>
                <th>Status Pernikahan</th>
                <th>Agama</th>
                <th>Status Regis</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $datas->full_name }}</td>
                <td>{{ $datas->id_card_address }}</td>
                <td>{{ $datas->current_address }}</td>
                <td>{{ $datas->district }}</td>
                <td>{{ $datas->regency }}</td>
                <td>{{ $datas->province }}</td>
                <td>{{ $datas->phone_number }}</td>
                <td>{{ $datas->email }}</td>
                <td>{{ $datas->nationality_status }}</td>
                <td>{{ $datas->foreign_nationality }}</td>
                <td>{{ $datas->birth_date }}</td>
                <td>{{ $datas->birth_place }}</td>
                <td>{{ $datas->gender }}</td>
                <td>{{ $datas->marital_status }}</td>
                <td>{{ $datas->religion }}</td>
                <td>{{ $datas->registration_status }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table2">
        <thead>
            <tr>
                <th>Tanda Tangan</th>
            </tr>
        </thead>
        <tbody class="table2Body">
            <tr>
                <td>{{ $datas->full_name }}</td>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>