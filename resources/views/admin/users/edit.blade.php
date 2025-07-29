
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Role for: {{ $user->name }}</h3>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="role">Select Role</label>
            <select name="role" id="role" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role }}" {{ $user->hasRole($role) ? 'selected' : '' }}>
                        {{ $role }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
