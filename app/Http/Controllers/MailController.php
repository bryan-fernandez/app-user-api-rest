<?php

namespace App\Http\Controllers;

use App\Mail\UpdatePasswordMailable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function updatePassword(Request $request){
        $request->validate([
            'id'=>['required'],
        ]);

        $user = User::findOrFail($request->id);
        $correo = new UpdatePasswordMailable;
        Mail::to($user->email)->send($correo);
        return response()->json(['message'=>'Mensaje enviado'], 200);
    }
}
