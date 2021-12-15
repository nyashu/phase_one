<?php

namespace App\Http\Controllers;

use App\Models\User;

class TrashController extends Controller
{
    public function index()
    {
        $trash = User::onlyTrashed()->simplePaginate(7);
        return view('trash', compact('trash'));
    }

    public function delete($id)
    {
        // var_dump($id);
        User::onlyTrashed()->find($id)->forceDelete();
        return redirect('trash')->with('success', 'Permanently deleted !!');
    }

    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return redirect('trash')->with('success', 'User restored !!');
    }
}
