<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function getChat(){


        $messages = Message::orderBy('id', 'desc')->get();

        return view('pages.chat')->with('messages' , $messages);
    }

    public function sendMessage(Request $request){

        $send = new Message();
        $send->from_name = Auth::user()->name;
        $send->message = $request->message;

        $send->save();


        return response()->json($send);

    }
    public function getMessage(){

        $message = Message::all();

        return response()->json($message);
    }
}
