@extends('layout.master')
@section('content')
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Client Case Create</h5>
            </div><!-- end card header -->

            @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismis="alert">×</button>
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('cases.store') }}">
                    @csrf
                    <div class="row">
                        <!-- Client Dropdown -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="client_id" class="form-label">Select Client</label>
                                <select name="client_id" id="client_id" class="form-control">
                                    <option value="">Select Client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Attorney Dropdown -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="attorney_id" class="form-label">Select Attorney</label>
                                <select name="attorney_id" id="attorney_id" class="form-control">
                                    <option value="">Select Attorney</option>
                                    @foreach ($attorneys as $attorney)
                                        <option value="{{ $attorney->id }}">{{ $attorney->name }}</option>
                                    @endforeach
                                </select>
                                @error('attorney_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Court Date -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="court_date" class="form-label">Court Date</label>
                                <input type="date" name="court_date" class="form-control" id="court_date">
                                @error('court_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Case Details -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="case_details" class="form-label">Case Details</label>
                                <textarea name="case_details" class="form-control" id="case_details" rows="3" placeholder="Enter Case Details"></textarea>
                                @error('case_details')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
