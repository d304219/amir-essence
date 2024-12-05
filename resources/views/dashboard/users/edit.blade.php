@extends('layouts.dashboard')

@section('content')
    <div class="container">

        <h1>Dashboard</h1>
        <h2>User Edit</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- Form section -->
            <div class="col-md-8">
                <form method="post" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method("PUT")

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password if changing">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control" id="gender">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" id="address">{{ $user->address }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="isAdmin">Admin Status</label>
                        <select name="isAdmin" class="form-control" id="isAdmin">
                            <option value="0" {{ $user->isAdmin == '0' ? 'selected' : '' }}>User</option>
                            <option value="1" {{ $user->isAdmin == '1' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="buttons d-flex flex-md-row mt-4 gap-2">
                        <!-- Update Form -->
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input class="btn btn-primary" type="submit" value="Update">
                        </form>
                    
                        <!-- Delete Form -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
