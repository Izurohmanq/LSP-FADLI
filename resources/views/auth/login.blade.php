@include('layouts.layout')
    <section id="login">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="mt-5 w-50">
                    <div class="form-login m-auto ps-5">
                        <h2 class="fw-bold mb-4">Login</h2>
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" id="email" class="form-control form-control-lg" name="email"
                                    placeholder="masukan email"
                                    value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" />
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label
                                " for="password">Password</label>
                                <input type="password" id="password" class="form-control form-control-lg" name="password"
                                    placeholder="masukan password"
                                    value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" />
                            </div>
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="check"
                                    name="check" />
                                <label class="form-check-label" for="check">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2" style="margin-left: 50px;">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have Account? <a href="{{'register'}}"
                                class="link-danger">Register</a></p>
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