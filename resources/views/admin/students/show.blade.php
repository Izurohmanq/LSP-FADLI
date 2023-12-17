@extends('layouts.layout')

@section('content')
<section id='detail'>
  <div class="container">
    @auth
    <h1 class='tambahh1'>{{ $student->full_name }}</h1>
    <p class='tambahp'>Detail Student {{ $student->full_name }}</p>
    <div class='d-flex justify-content-center align-items-start gap-5 mt-5'>
      <form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        @method('put')
        <label for="full_name">Nama Lengkap</label>
        <input type="text" id="full_name" name="full_name" value='{{ $student->full_name }}'>
        <label for="id_card_address">Alamat KTP</label>
        <input type="text" id="id_card_address" name="id_card_address" value='{{ $student->id_card_address }}'>
        <label for="current_address">Alamat sekarang</label>
        <input type="text" id="current_address" name="current_address" value='{{ $student->current_address }}'>

        <label for="province">Provinsi</label>
        <select id="province" name="province">
          @foreach ($provinsi as $province)
          <option value="{{ $province['nama'] }}" {{ $student->province === $province['name'] ? 'selected' : '' }}>{{ $province['name'] }}</option>
          @endforeach
        </select>

        <label for="regency">Kabupaten</label>
        <select id="regency" name="regency">
          @foreach ($regencies as $regency)
          <option value="{{ $regency->name }}" {{ $student->regency === $regency->name ? 'selected' : '' }}>{{ $regency->name }}</option>
          @endforeach
        </select>

        <label for="district">Kecamatan</label>
        <select id="district" name="district">
          @foreach ($districts as $district)
          <option value="{{ $district->name }}" {{ $student->district === $district->name ? 'selected' : '' }}>{{ $district->name }}</option>
          @endforeach
        </select>


        <label for="phone_number">NoHP</label>
        <input type="number" id="phone_number" name="phone_number" value='{{ $student->phone_number }}'>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value='{{ $student->email }}'>
        <label for="nationality_status">Status Kewarganegaraan</label>
        <select id="nationality_status" name="nationality_status">
          <option value="WNI" {{ $student->nationality_status === 'WNI' ? 'selected' : '' }}>WNI</option>
          <option value="WNI Keturanan" {{ $student->nationality_status === 'WNI Keturanan' ? 'selected' : '' }}>WNI Keturunan</option>
          <option value="WNA" {{ $student->nationality_status === 'WNA' ? 'selected' : '' }}>WNA</option>
        </select>
        <label for="foreign_nationality">Warga negara asing</label>
        <input type="text" id="foreign_nationality" name="nationality_status" value='{{ $student->nationality_status }}'>
        <label for="date_of_birth">tanggal Lahir</label>
        <input type="date" id="birth_data" name="birth_date" value="{{ $student->birth_date }}">
        <label for="birth_place">Tempat Lahir</label>
        <input type="text" id="birth_place" name="birth_place" value='{{ $student->birth_place }}'>
        <label for="gender">Kelamin</label>
        <select id="gender" name="gender">
          <option value="male" {{ $student->gender === 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ $student->gender === 'female' ? 'selected' : '' }}>Female</option>
        </select>
        <label for="marital_status">Status</label>
        <select id="marital_status" name="marital_status">
          <option value="single">Single</option>
          <option value="married">Married</option>
          <option value="other">Other</option>
        </select>
        <label for="religion">Agama</label>
        <select id="religion" name="religion">
          <option value="Islam" {{ $student->religion === 'Islam' ? 'selected' : '' }}>Islam</option>
          <option value="Catholic" {{ $student->religion === 'Catholic' ? 'selected' : '' }}>Catholic</option>
          <option value="Christian" {{ $student->religion === 'Christian' ? 'selected' : '' }}>Christian</option>
          <option value="Hindu" {{ $student->religion === 'Hindu' ? 'selected' : '' }}>Hindu</option>
          <option value="Buddha" {{ $student->religion === 'Buddha' ? 'selected' : '' }}>Buddha</option>
          <option value="Other" {{ $student->religion === 'Other' ? 'selected' : '' }}>Other</option>
        </select>
        <label for="inputGroupFile01">Document</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="document" style="height: 40px;">
        
        <label for="regis_status" >Status Registrasi</label>
        <select id="registration status" name="registration status" class="mt-3">
          <option value="pending" {{ $student->registration_status === 'pending' ? 'selected' : '' }}>pending</option>
          <option value="accepted" {{ $student->registration_status === 'accepted' ? 'selected' : '' }}>accepted</option>
          <option value="rejected" {{ $student->registration_status === 'rejected' ? 'selected' : '' }}>rejected</option>
        </select>
        <button type="submit" class='btn btn-primary w-100' style='margin-top: 40px;'>Edit</button>
      </form>
    </div>
    @endauth
  </div>
</section>
@if (session('success'))
<script>
  alert("{{ session('success') }}");
</script>
@endif
@endsection