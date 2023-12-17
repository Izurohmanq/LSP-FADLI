@extends('layouts.layout')

@section('content')
<section id="list">
    <div class="container">
        <h1>My Users List</h1>
        <a href="{{ route('users.create') }}">
            <button class="btn btn-primary my-2">
                Create
            </button>
        </a>
        @if (count($users) > 0)
        <div class="table-responsive">
            <table class="table-striped table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <img src="{{ $user->image }}" class="w-25" alt="Gambar">
                        </td>
                        <td class="flex">
                            @if ($user->id !== auth()->user()->id)
                            <a href="{{ route('users.edit', $user->id) }}">
                                <button class="btn btn-primary mb-2">Edit</button>
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>

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