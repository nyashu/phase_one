@extends('layouts.master')


@section('title')
    Login Section
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mx-auto pt-4">

                @if ($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                @if (session()->has('fail'))

                    <div class="alert alert-danger">
                        {{ session()->get('fail') }}
                    </div>

                @endif

                <h2 class="text-primary py-2">Login Form</h2>
                <form method="POST" action="{{ route('login_check') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                            name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
