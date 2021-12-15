@extends('layouts.master')

@section('content')

    <div class="container py-2">
        <h3 class="text-info py-2 text-center"> Trash </h3>

        @if (session()->has('success'))

            <div class="alert alert-success alert-dismissibles">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>     
                {{ session()->get('success') }}
            </div>


        @endif

        <table class="table table-dark mt-3 ">
            <tr>
                <th> ID </th>
                <th> User Name </th>
                <th> Email </th>
                <th> Restore/Delete </th>
            </tr>


            @foreach ($trash as $details)
                <tr>
                    <td> {{ $details->id }} </td>
                    <td> {{ $details->user_name }} </td>
                    <td> {{ $details->email }} </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('restore', $details->id) }}" class="px-3 text-success border mx-2" > Restore </a>
                            <a href="{{ route('delete_trash', $details->id) }}" class="text-danger border px-3"> Delete </i></a>
                        </div>
                    </td>
                </tr>


            @endforeach
        </table>
        <div class="container d-flex justify-content-center py-2">
            {{ $trash->links() }}
        </div>
    </div>


@endsection
