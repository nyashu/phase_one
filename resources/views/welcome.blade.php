@extends('layouts.master')

@section('content')


    <div class="container mt-5">
            <h3 class="bg-light text-center p-2"><span class="text-danger">Hello, </span> {{ auth()->user()->user_name }}</h3>
    </div>

    <div class="alert alert-info container my-5">
         <h4 class="text-center "><u>Login details</u></h4>
         <ul class="">
             <li>
                 Last time login :  <small class="text-danger p-1 border border-dark">{{ auth()->user()->last_login_at->diffForHumans() }}</small>
             </li>
             <br>
             <li>
                Current login :  <small class="text-danger p-1 border border-dark">{{ auth()->user()->current_login_at->diffForHumans() }}</small>
            </li>
         </ul>
            
    </div>



@endsection
