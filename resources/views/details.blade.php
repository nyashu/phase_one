@extends('layouts.master')

@section('content')

    <div class="container py-2">
        <h3 class="text-danger py-2 text-center"> User Details </h3>

        @if (session()->has('success'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                {{ session()->get('success') }}
            </div>


        @endif

        <table class="table table-striped mt-3 ">
            <tr>
                <th> ID </th>
                <th> User Name </th>
                <th> Contact No. </th>
                <th> Email </th>
                <th> Edit/Delete </th>
            </tr>


            @foreach ($users_detail as $details)
                <tr>
                    <td> {{ $details->id }} </td>
                    <td> {{ $details->user_name }} </td>
                    <td> {{ $details->phone }} </td>
                    <td> {{ $details->email }} </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('edit', $details->id) }}" class="px-3"> <i
                                    class="fas fa-user-edit text-success"></i> </a>
                            <a href="{{ route('delete', $details->id) }}" data-toggle="tooltip" data-placement="right"
                                title="Move to trash"> <i class="far fa-trash-alt text-danger"></i></a>
                        </div>
                    </td>
                </tr>


            @endforeach
        </table>
        <div class="container d-flex justify-content-center py-2">
            {{ $users_detail->links() }}
        </div>
    </div>

    


@endsection
