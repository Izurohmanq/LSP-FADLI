  <!-- Nav -->
  <nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="container py-2">
        @auth
            <div class="navbar-nav">
                <a class="nav-link" style="color: white;">Home</a>

                <a class="nav-link" href="{{ '/admin/students' }}">My Student</a>
                @if( auth()->user()->role == 'student')
                <a class="nav-link" href="{{ route('calon_mahasiswa.show') }}">My Status</a>
                @else
                <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                @endif
            </div>
            <div class="d-flex">
                <div class="dropdown ms-4">
                    <button class="btn btn-light dropdown-toggle text-" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('users.edit', auth()->user()->id) }}" class="dropdown-item text-dark">
                                Profile
                            </a>
                        </li>
                        <li>
                            <form action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="navbar-nav w-100 d-flex justify-content-between">
                <a class="nav-link active" aria-current="page" href="{{ 'home' }}">Home</a>
                <a class="nav-link" href="{{ '/' }}">Login</a>
            </div>
        @endauth

    </div>
</nav>
<!-- Nav End -->