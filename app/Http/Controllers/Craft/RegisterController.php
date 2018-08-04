<?php
namespace App\Http\Controllers\Craft;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Craft;
class RegisterController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function registerForm()
	{
		return view ('users.craft.register');
	}
	public function register( Request $request)
	{
		// dd($request->all());
		$request->validate( [
			'name'=>'required|max:20|unique:Craft',
			'price'=>'required|max:6',
			'quntity'=>'required|Numeric',
			'description'=>'max:300',
			'image'=>'file|max:2000'

		]);
			$destination='uploads';
				$datas 	= new Craft;
			$datas->name = $request->name;
			$datas->user_id = $request->user_id;
			$datas->price = $request->price;
			$datas->quntity = $request->quntity;
			$datas->handicrafttype= $request->handicrafttype;
			$datas->description= $request->description;
			$datas->save();
			
			$destination = $destination.DIRECTORY_SEPARATOR.'product'.$datas->id;
			if ($request->hasFile('image'))
			{
				for($i=0; $i < count($request->file('image')); $i++):
					$image=$request->file('image')[$i];
					$imageName = $image->getClientOriginalName();
					$image->move($destination,$imageName);
					$img = $i + 1;
					$datas['imgname'.$img] = $destination.DIRECTORY_SEPARATOR.$imageName;
					
				endfor;
				$datas->update();
			}
			
			return $datas ? redirect()->back()->with('status', 'Product registered successfully.')
											: redirect()->back()->with('status', 'Request Failed.');
				
	}
}