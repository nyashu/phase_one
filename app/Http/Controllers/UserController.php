<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{

    public function index()
    {
       $users_detail =  User::all();

        return view('details', compact('users_detail'));
    }




    public function edit($id)
    {
        $users_detail = User::find($id);

        return view('edit', compact('users_detail'));
    }




    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|min:4',
            'email' => 'required|email',
            'phone' => 'required|max:20',
        ]);

        User::find($id)->update($validated);

        return redirect('/details')->with('success', 'Your data has been updated !!');

    }





    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/details')->with('success', "User detail has been deleted !!!");
    }
}
