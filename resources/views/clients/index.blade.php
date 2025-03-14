@extends('layout.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h5 class="col-6 card-title mt-3 mb-0">Client Management</h5>
                    <div class="col-6 d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary create">Create</a>
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
                            <th scope="col">Company Name</th>
                            <th scope="col">Gst Number</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = 1; @endphp
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->address }}</td>
                                <td>{{ $client->company_name }}</td>
                                <td>{{ $client->gst_number }}</td>
                                <td>
                                    <span
                                        class="badge {{ $client->status == 'inactive' ? 'bg-danger' : 'bg-success' }}">{{ $client->status }}</span>
                                </td>

                                <td class="d-flex gap-1">
                                    <a href="{{ route('clients.edit', $client->id) }}"
                                        class="btn btn-sm btn-secondary">Edit</a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
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
