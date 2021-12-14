@extends('layouts.master')


@section('title')
    Registration Form
@endsection

@section('content')


    <div class="container mt-1">
        <div class="row">
            <div class="col-sm-4 mx-auto">
                <h2 class="text-danger py-1">User Registration</h2>

                @if ($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                @if (session()->has('success'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{ session()->get('success') }}
                    </div>

                @endif

                <form action="{{ route('registered') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUser">User Name</label>
                        <input type="text" class="form-control" id="exampleInputUser" name="user_name"
                            placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNumber">Number</label>
                        <input type="text" class="form-control" id="exampleInputNumber" name="phone"
                            placeholder="Enter phone number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                            placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword2">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" name="confirm_password"
                            placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
