@extends('layouts.dashboard')

@section('content')
    <div class="wrapper">
        <h1>Dashboard</h1>
        <h2>Users Control</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Admin Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->isAdmin ? 'Admin' : 'User' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
    </div>

    <script>
        // Auto-dismiss alert after 3 seconds
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.style.transition = 'opacity 0.8s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 1000);
            }
        }, 3000);
    </script>
@endsection
