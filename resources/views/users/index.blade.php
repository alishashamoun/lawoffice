@extends('layout.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h5 class="col-6 card-title mt-3 mb-0">User List</h5>
                    <div class="col-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary create">Create</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-border mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $id = 1; @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->getRoleNames() as $v)
                                            <span class="badge text-bg-success">{{ $v }}</span>
                                        @endforeach
                                    </td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-sm btn-secondary">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </ td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
