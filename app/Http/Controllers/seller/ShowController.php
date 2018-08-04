<?php
namespace App\Http\Controllers\seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Chat;
class ShowController extends Controller
{
public function show(User $user)
{
    $seen = [];
    $chat = '';
    $chats = Chat::select('from as customer_id', 'seen')->distinct()->where([
        'to'=> $user->id,
    ])->get();
if(count($chats)>0):
foreach($chats as $val):
$chat .= 'id='.$val->customer_id.' or ';
$seen[$val->customer_id] = $val->seen ;
endforeach;
$chats = User::whereRaw(trim($chat, 'or '))->get();
endif;
        // return $seen;
    return count($chats) > 0 ? view('users.seller.profile', compact('user', 'chats', 'seen'))
                : view('users.seller.profile', compact('user'));
}


}