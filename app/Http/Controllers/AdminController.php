<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function admin()
    {
        $users = DB::table('users')->get();
        return view('admin.home', compact('users'));
    }

    public function approved(Request $request, $user)
    {
        $data = User::find($user);

        if($data->approved == 0)
        {
            $data->approved = 1;
        }else
        {
            $data->approved = 0;
        }

        $data->save();

        return redirect()->back()->with(session()->flash('alert-success', 'Mise a jour effectue!'));
    }
}

