@extends('layouts.master')

@section('content')

    <div class="container mt-1">
        <div class="row">
            <div class="col-sm-4 mx-auto">
                <h2 class="text-danger py-2">User Details</h2>

                @if ($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif


                <form action="{{ route('update', $users_detail->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUser">User Name</label>
                        <input type="text" class="form-control" value="{{ $users_detail->user_name }}" id="exampleInputUser"
                            name="user_name" placeholder="Enter username">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputNumber">Number</label>
                        <input type="text" class="form-control" id="exampleInputNumber" value="{{ $users_detail->phone }}" name="phone"
                            placeholder="Enter phone number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" value="{{ $users_detail->email }}" name="email"
                            id="exampleInputEmail1" placeholder="Enter email">
                    </div>

                    <div>
                        <a href="{{ route('change_password', $users_detail->id) }}"> change your password from here ! </a>

                    </div>


                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>


@endsection
