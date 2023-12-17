@extends('layouts.layout')

@section('content')
<section id="home">
    <div class="container">
        <div class="d-flex gap-5 wrap justify-content-center align-items-center">
            <div>
                <h1>Welcome Student!</h1>
            </div>
        </div>
    </div>
</section>
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

@endsection