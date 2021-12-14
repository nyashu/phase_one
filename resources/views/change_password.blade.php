@extends('layouts.master')

@section('content')

    <div class="container mt-1">
        <div class="row">
            <div class="col-sm-4 mx-auto">
                <h2 class="text-danger py-5">Change Password</h2>

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

                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>

                @endif

                <form action="{{ route('password_check', $key->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter current password"
                            name="current_password">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter new password" name="new_password">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter new password again"
                            name="new_password_again">
                    </div>



                    <button type="submit" class="btn btn-primary mt-3">Change</button>
                </form>
            </div>
        </div>
    </div>


@endsection
