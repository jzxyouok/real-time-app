<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class VueChatController extends Controller
{
    public function index()
    {
    	return view('vuechat.index');
    }
}