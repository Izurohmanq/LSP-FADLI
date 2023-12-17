@extends('layouts.layout')

@section('content')
<section id='form'>
  <div class="container ms-5">
    <h1 class="tambahh1">Selamat Datang Calon Mahasiswa</h1>
    <p class="tambahp">Silahkan isi data kalian di form bawah ini</p>
    <form action="{{ route('calon_mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <label for="full_name">Nama Lengkap</label>
      <input type="text" id="full_name" name="full_name" placeholder="Full Name">
      <label for="id_card_address">Alamat KTP</label>
      <input type="text" id="id_card_address" name="id_card_address" placeholder="Id Card Address">
      <label for="current_address">Alamat Sekarang</label>
      <input type="text" id="current_address" name="current_address" placeholder="Current Address">
      <label for="province">Provinsi</label>
      <select id="province" name="province">
        @foreach ($provinsi as $province)
        <option value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach
      </select>
      <label for="regency">Kabupaten</label>
      <select id="regency" name="regency">
        <option value="">pilih kabupaten</option>

      </select>
      <label for="district">Kecamatan</label>
      <select id="district" name="district">
        <option value="">Pilih Kecamatan</option>

      </select>
      <label for="phone_number">No HP</label>
      <input type="number" id="phone_number" name="phone_number" placeholder="Phone Number" onblur="validatePhoneNumber()">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Email" onblur="validateEmail()">
      <label for="nationality_status">Kewarganegaraan</label>
      <select id="nationality_status" name="nationality_status">
        <option value="WNI">WNI</option>
        <option value="WNI Keturanan">WNI Keturunan</option>
        <option value="WNA">WNA</option>
      </select>
      <label for="foreign_nationality">Warga Negara Asing</label>
      <input type="text" id="foreign_nationality" name="foreign_nationality" placeholder="Foreign Nationality">
      <label for="birth_date">Tanggal lahir</label>
      <input type="date" id="birth_date" name="birth_date">
      <label for="birth_place">Tempat Lahir</label>
      <input type="text" id="birth_place" name="birth_place" placeholder="Birth Place">
      <label for="gender">Kelamin</label>
      <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
      <label for="marital_status">Status pernikahan</label>
      <select id="marital_status" name="marital_status">
        <option value="single">Single</option>
        <option value="married">Married</option>
        <option value="other">Other</option>
      </select>
      <label for="religion">Agama</label>
      <select id="religion" name="religion">
        <option value="Islam">Islam</option>
        <option value="Catholic">Catholic</option>
        <option value="Christian">Christian</option>
        <option value="Hindu">Hindu</option>
        <option value="Buddha">Buddha</option>
        <option value="Other">Other</option>
      </select>
      <label for="inputGroupFile01">upload transkrip nilai</label>
      <input type="file" class="form-control" id="inputGroupFile01" name="document" style="height: 40px;">
      <button type="submit" class="btn btn-primary" style="margin-top: 40px;">Selesai</button>
    </form>
  </div>
</section>
@if (session('success'))
<script>
  alert("{{ session('success') }}");
</script>
@endif
<script>
  function validateEmail() {
    var email = document.getElementById('email').value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      alert('Email address is not valid. Please enter a valid email.');
      document.getElementById('email').value = '';
    }
  }
  $(function() {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      }
    })
  })

  function validatePhoneNumber() {
    var phoneNumber = document.getElementById('phone_number').value;
    var phonePattern = /^\d{10,15}$/;
    if (!phonePattern.test(phoneNumber)) {
      alert('Invalid phone number. Please enter a valid phone number.');
      document.getElementById('phone_number').value = '';
    }
  }

  $(function() {
    $('#province').on('change', function() {
      let id_provinsi = $('#province').val();

      $.ajax({
        type: 'POST',
        url: "{{ route('getKabupaten') }}",
        data: {
          id_provinsi: id_provinsi
        },
        cache: false,
        success: function(msg) {
          $('#regency').html(msg);
          $('#district').html('');
        },
        error: function(data) {
          console.log("error", data)
        }
      })
    })
  })
  $(function() {
    $('#regency').on('change', function() {
      let id_kabupaten = $('#regency').val();

      $.ajax({
        type: 'POST',
        url: "{{ route('getKecamatan') }}",
        data: {
          id_kabupaten: id_kabupaten
        },
        cache: false,

        success: function(msg) {
          $('#district').html(msg);
        },
        error: function(data) {
          console.log("error", data)
        }
      })
    })
  })
</script>
@endsection