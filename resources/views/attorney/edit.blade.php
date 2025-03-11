@extends('layout.master')
@section('content')
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Attorney Edit</h5>
            </div><!-- end card header -->

            @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismis="alert">×</button>
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('attorneys.update', $attorney->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="Name" class="form-label">
                                    Name
                                </label>
                                <input type="text" name="name" value="{{ $attorney->name }}" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    Email
                                </label>
                                <input type="email" name="email" value="{{ $attorney->email }}" class="form-control"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="Phone" class="form-label">
                                    Phone Number
                                </label>
                                <input type="num" name="phone" class="form-control" value="{{ $attorney->phone }}"
                                    id="Phone" placeholder="Enter Phone">
                            </div>
                        </div>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    Address
                                </label>
                                <input type="text" name="address" class="form-control" value="{{ $attorney->address }}"
                                    placeholder="Enter Address">
                            </div>
                        </div>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    Status
                                </label>
                                <select type="text" name="status" id="status" class="form-control">
                                    <option value="active" {{ $attorney->status == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ $attorney->status == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>
                        </div>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
