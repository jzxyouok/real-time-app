<?php

namespace App\Http\Controllers;

use App\User;

class VueChatController extends Controller
{

    public function index()
    {
        $user = User::where('id', 1)->firstOrFail();
        $friends = User::findOrFail([2,3,4]);

    	return view('vuechat.index')
        ->with('user', $user)
        ->with('friends', $friends);
    }

    public function show()
    {
    	
    }

    public function aboutIndex()
    {
    	return view('vuechat.about');
    }

    public function contactIndex()
    {
    	return view('vuechat.contact');
    }
}
