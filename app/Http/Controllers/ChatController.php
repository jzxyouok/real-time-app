<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    var $pusher;
    var $user;
    var $loggedIn;

    const DEFAULT_CHAT_CHANNEL = 'loggedin';

    public function __construct()
    {
        $this->pusher = App::make('pusher');
        $this->user = Session::get('user');
        $this->loggedIn = self::DEFAULT_CHAT_CHANNEL;
    }

    public function getIndex()
    {
        if(!$this->user)
        {
            return redirect('auth/github?redirect=/chat');
        }

        $loggedStatus = [
            'status' => 'Online',
            'username' => $this->user->getNickname()
        ];

        $this->pusher->trigger($this->loggedIn, 'status', $loggedStatus);
        
        return view('chat', ['loggedIn' => $this->loggedIn]);
    }

    public function postMessage(Request $request)
    {
        $message = [
            'text' => e($request->input('chat_text')),
            'username' => $this->user->getNickname(),
            'avatar' => $this->user->getAvatar(),
            'timestamp' => (time()*1000)
        ];
        $this->pusher->trigger($this->loggedIn, 'new-message', $message);
    }
}
