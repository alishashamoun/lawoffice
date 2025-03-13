    @extends('layout.master')
    @section('content')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h5 class="col-6 card-title mt-3 mb-0">Case Management</h5>
                        <div class="col-6 d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('cases.create') }}" class="btn btn-sm btn-primary create">Create</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="clientTable" class="table table-border mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Attorney Name</th>
                                    <th scope="col">Court Date</th>
                                    <th scope="col">Case Detail</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id = 1; @endphp
                                @foreach ($clientcases as $clientcase)
                                    <tr>
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $clientcase->client->name ?? 'N/A' }}</td>
                                        <td>{{ $clientcase->attorney->name ?? 'N/A' }}</td>
                                        <td>{{ $clientcase->court_date }}</td>
                                        <td>{{ $clientcase->case_details }}</td>
                                        <td>
                                            @if ($clientcase->status === 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif ($clientcase->status === 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @else
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td class="d-flex gap-1">
                                            <!-- Approve Button (Sirf Pending Cases Ke Liye) -->
                                            @if ($clientcase->status === 'pending')
                                                <form action="{{ route('cases.approve', $clientcase->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                            @endif
                                            <a href="{{ route('cases.edit', $clientcase->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                            <a href="{{ route('cases.show', $clientcase->id) }}" class="btn btn-sm btn-info">Show</a>

                                            <form action="{{ route('cases.destroy', $clientcase->id) }}" method="POST"
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
        </div>
    @endsection
