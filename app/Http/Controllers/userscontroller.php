<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
class userscontroller extends Controller
{
public function welcome(){
	$title='welcome sir this is from compact !!';
	// return view('admin.users.index',compact('title'));
	return view('users.index')->with('title',$title);
}
public function contact(){
$title='this is contact info';
	// return view('admin.users.contact');
	return view('users.contact')->with('title',$title);
}
public function create(){
$title='Create somthing';
	// return view('admin.users.contact');
	return view('users.create1')->with('title',$title);
}
public function store(Request $request)
	{
		$this->validate($request,[
			'title' => 'required|max:100|min:5',
			'body' => 'required|max:255|min:10'
			]);
		$post = new Post;
		$post->title = $request->title;
		$post->body = $request->body;
		$post->save();
		return $post;
}
	
public function about(){
$data=array(
	'name' => 'about us',
	'department' => ['management','sales','departure']
	);
	return view('users.about')->with($data);
	}
	public function index(){
		$posts = Post::all();
		return view('users.all-post', compact('posts'));
	}
	public function show($id){
		$post = Post::find($id);
		return view('users.personal', compact('post'));
	}


		public function help()
		{
		
		return view('users.help');
	}
}