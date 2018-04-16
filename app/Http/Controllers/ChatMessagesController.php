<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use Auth;
use Illuminate\Http\Request;
use Notification;

class ChatMessagesController extends Controller
{
    public function store(Request $request)
    {
//        event(new ChatMessage($request->body));

//        $chat->notify(new \App\Notifications\ChatMessage('Hola que tal!'));
        Notification::send(Auth::user(),new \App\Notifications\ChatMessage($request->body));
    }

}
