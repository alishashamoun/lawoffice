@extends('layout.master')
@section('content')
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Client Case Details</h5>
            </div><!-- end card header -->

            @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismis="alert">×</button>
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5>Client Name : {{ $clientcase->client->name }}</h5>
                        <h5>Attorney Name : {{ $clientcase->attorney->name }}</h5>
                        <h6>Court Date : {{ $clientcase->court_date }}</h6>
                        <p>Case Detail : {{ $clientcase->case_details }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
