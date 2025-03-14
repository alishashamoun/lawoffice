@extends('layout.master')
@section('content')
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Client Case Details</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <h6>Court Date : {{ $clientcase->court_date }}</h6>
                        <h5>Client Name : {{ $clientcase->client->name }}</h5>
                        <h5>Attorney Name : {{ $clientcase->attorney->name }}</h5>
                        <p>Case Detail : {{ $clientcase->case_details }}</p>
                    </div>
                    <div class="col-1">
                        <h6>Start Time : {{ $clientcase->start_time }}</h6>
                    </div>
                    <div class="col-1">
                        <h6>End Time : {{ $clientcase->end_time }}</h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
