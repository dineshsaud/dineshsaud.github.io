<?php
namespace App\Http\Controllers\Craft;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Craft;
use App\User;
class CraftPostController extends Controller
{
	public function viewProducts()
	{
		$sellers = \App\User::all();
		$crafts = Craft::all();
				return view('users.craft.results',compact('crafts','sellers'));
	}
	public function details(Craft $craft)
	{
		$craft->views++;
		$craft->update();
		$malePopular=Craft::Where('handicrafttype','Paper Craft')->orderBy('rating','desc')->limit(1)->first();
		$femalePopular=Craft::Where('handicrafttype','Metal Craft')->orderBy('rating','desc')->limit(1)->first();
			return view('users.craft.details', compact('craft','malePopular','femalePopular'));
		}
	public function viewProductByCategory($type)
	{
		$sellers = \App\User::all();
		$crafts = Craft::where('handicrafttype', $type)->get();
		return view('users.craft.results',compact('crafts','sellers'));
	}
	public function viewProductByName(Request $name)
	{
	
		$sellers = \App\User::all();
		$crafts = Craft::where('name','like', $name->craft_name.'%')->get();
		return view('users.craft.results',compact('crafts','sellers'));
	}
	public function deleteCrafts($craft)
	{
		Craft::find($craft)->delete();
		return redirect()->back();
	}
	public function showEditCraftForm(Craft $craft){
		$product = array_only(json_decode($craft, true), ['id','name', 'price', 'quntity', 'description', 'handicrafttype']);
		$product['body'] = \View::make('users.craft.edit', compact('product'))->render();
		return $product;
	}
	public function updateCraft(Request $request, $craft)
	{
			Craft::where('id',$craft)->update($request->only('name','price','quntity','handicrafttype','description'));
				return redirect()->back();
	}
}