@extends('layouts.layout')

@section('content')
<section id="list">
  <div class="container">
    <h1>My Student List</h1>
    @if (count($students) > 0)
    <div class="table-responsive">
      <table class="table-striped table">
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
          @foreach ($students as $row)
          <tr>
            <td>{{ $row->full_name }}</td>
            <td>{{ $row->id_card_address }}</td>
            <td>{{ $row->current_address }}</td>
            <td>{{ $row->district }}</td>
            <td>{{ $row->regency }}</td>
            <td>{{ $row->province }}</td>
            <td>{{ $row->phone_number }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->nationality_status }}</td>
            <td>{{ $row->foreign_nationality }}</td>
            <td>{{ $row->birth_date }}</td>
            <td>{{ $row->birth_place }}</td>
            <td>{{ $row->gender }}</td>
            <td>{{ $row->marital_status }}</td>
            <td>{{ $row->religion }}</td>
            <td>{{ $row->registration_status }}</td>
            <td><a href="{{ route('generatePDF', $row->id) }}"><button class="btn btn-primary">print</button></a></td>
            @endforeach
        </tbody>
      </table>
    </div>
    @else
    <p>No data in database.</p>
    @endif
  </div>
</section>
@endsection

@if (session('success'))
<script>
  alert(`{{ session('success') }}`)
</script>
@endif