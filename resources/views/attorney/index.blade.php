@extends('layout.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h5 class="col-6 card-title mt-3 mb-0">Attorney Management</h5>
                    <div class="col-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('attorneys.create') }}" class="btn btn-sm btn-primary create">Create</a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive-xl">
                <table id="casesTable" class="table table-bordered table-striped border">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = 1; @endphp
                        @foreach ($attorneys as $attorney)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $attorney->name }}</td>
                                <td>{{ $attorney->email }}</td>
                                <td>{{ $attorney->phone }}</td>
                                <td>{{ $attorney->address }}</td>
                                <td>
                                    <span
                                        class="badge {{ $attorney->status == 'inactive' ? 'bg-danger' : 'bg-success' }}">{{ $attorney->status }}</span>
                                </td>

                                <td class="d-flex gap-1">
                                    <a href="{{ route('attorneys.edit', $attorney->id) }}"
                                        class="btn btn-sm btn-secondary">Edit</a>
                                    <form action="{{ route('attorneys.destroy', $attorney->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this client?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
