@include('layouts.layout')

<section id="register">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="mt-5 w-50">
                <div class="form-login m-auto ps-5">
                    <h2 class="fw-bold mb-4">Register</h2>
                    <form action="{{ route('register.post')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="mb-3 position-relative">
                            <label class="form-label " for="email">Email address</label>
                            <span class="required" style="top: 0px; left: 41px;">*</span>
                            <input type="email" id="email" class="form-control form-control-lg" name="email"
                                placeholder="masukan email" required />

                        </div>
                        <!-- nama input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Name</label>
                            <span class="required" style="top: 0px; left: 41px;">*</span>
                            <input type="name" id="name" class="form-control form-control-lg" name="name"
                                placeholder="masukan name" required />
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <span class="required" style="top: 0px; left: 41px;">*</span>
                            <input type="password" id="password" class="form-control form-control-lg" name="password"
                                placeholder="masukan password" required />
                        </div>
                        <div class="form-outline mb-4">
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">anda sudah punya akun? <a
                                        href="{{ '/' }}" class="link-danger">Login</a></p>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@if (session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif