<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Chat;

class ChatController extends Controller
{
    public function fetch(Request $data){
   

		$messages = \DB::table('chats')
        ->whereRaw("(chats.from={$data->from} and chats.to={$data->to}) or (chats.from={$data->to} and chats.to={$data->from})")
        ->orderBy('created_at')->get();
		return view('users.chat.box', compact('messages'));
        
	}

    public function store(Request $data)
    {
    	\DB::table('chats')->insert([
    		"from" 		=> $data->from,
    		"to" 		=> $data->to,
    		"message"	=> $data->message,
    		"created_at"=> now()
    	]);
        
    }

    

    public function fetchInbox(Request $data){ 
    	$customer = User::find($data->customer);
        $chat = \DB::table('chats')
                ->where(["from"=>$data->customer, "to"=>$data->seller])
                ->update(["seen"=>1]); 
    	return view('users.chat.seller-chat-box', compact('customer'));
    }
}
