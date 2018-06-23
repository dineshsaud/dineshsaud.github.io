<?php
namespace App\Http\Controllers\Craft;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Craft;

class RegisterController extends Controller
{

	public function registerForm()
	{
		return view ('users.craft.register');
	}
	public function register( Request $request)
	{
			$destination='uploads';
			$datas 	= new Craft;
			$datas->name = $request->name;
			$datas->seller_id = $request->seller_id;
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
			
			return $datas ? redirect('/')->with('status', 'Product registered successfully.')
							: redirect()->back()->with('status', 'Request Failed.');				
				
	}
}