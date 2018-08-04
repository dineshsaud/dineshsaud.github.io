<?php
namespace App\Http\Controllers\seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\User;
class ModifyUserController extends Controller
{
	
	public function showUpdateUser($id)
	{
		$user =User::find($id);
		return view('users.seller.userUpdate',compact('user'));
	}
	public function userUpdate(Request $request)
	{

			$request->validate([
			'name'=>'required|max:20',
			'address'=>'required|string',
			'image'=>'max:2000'
			
				]
				);
		$dest = "uploads/Users";
		$path = "";
		if($request->hasFile('image')){
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();
			$filenametostore = time() . $filename;
			$file->move($dest, $filenametostore);
			$path = $dest . DIRECTORY_SEPARATOR . $filenametostore;
		}
		$user = User::where('id', $request->id)->get()[0];
		$data = $request->only('phone_no', 'address', 'name');
		$data["image"] = $path ? $path : $user->image;
		User::where('id',$request->id)->update($data);
		return redirect()->back();
	}
}