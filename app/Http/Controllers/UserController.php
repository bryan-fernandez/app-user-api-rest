<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['data'=> $users], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
            'birthdate'=>'required|date',
        ];

        $this->validate($request, $rules);

        $body = $request->all();
        $body['password'] = Hash::make($request->password);
        
        $user = User::create($body);
        return response()->json(['data'=> $user], 201);
    }
}
