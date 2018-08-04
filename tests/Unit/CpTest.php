<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Models\Craft;
use App\Models\Chat;
use App\Models\Review;
use App\Models\Question;
use App\Models\Answer;
class CpTest extends TestCase
{
/**
* A basic test example.
*
* @return void
*/
public function testIfDataIsCreated()
{
					User::create 	([
				'name'=>'testing',
'email'=>'laraveltester@test.com',
'password'=>'any',
'phone_no'=>'any',
'address'=>'ktm',
'gender'=>'male',
'dob'=>'1928-12-12',
'user_type'=>'seller',
'image'=>'image'
		]);
		$data=User::where('email','laraveltester@test.com')->first();
		$this->assertEquals($data->name,'testing');
}
public function test_Craft_data_Is_Insert()
{
		Craft::create([
           'name'=>'Sun ko chura',
           'user_id'=>7,
           'imgname1'=>'uploads\product7\cathy cullis3.png',
           'imgname2'=>'uploads\product7\cathy cullis3.png',
           'imgname3'=>'uploads\product7\cathy cullis3.png',
           'price'=>546556,
           'quntity'=>4564,
           'handicrafttype'=>'Paper craft',
           'description'=>'this is awesome',
           'views'=>5,
           'rating'=>2
				]);
				$data=Craft::where('name','Sun ko chura')->first();
// 		$this->assertEquals($data->name,'Sun ko chura');
// // }

public function test_Select_craft_by_Type()
{
		$craft=Craft::Where('handicrafttype','wooden and Furniture')->count();
				$this->assertNotNull($craft);
}
	public function test_If_user_have_Message()
	{
		
		$message=Chat::where('to',8)->first();
		$this->assertNotNull($message);
	}



	public function test_If_User_delete_can__his_Craft()
	{
		Craft::where('user_id',1)->delete();
		$data=Craft::select('user_id')->where('user_id',1)->get();
		$this->assertFalse($data->has(1));

	}
	public function test_Craft_Filter_By_Name()
	{

		$data=Craft::select('name')->where('id',4)->first();


		$this->assertEquals($data->name,'Trevor Mitchell');
	}

	public function test_Craft_High_rated()

	{
		 $data =Craft::select('name')->orderBy('rating', 'desc')->limit(1)->first();

		 $this->assertEquals($data->name,'Trevor Mitchell');
		
	}


	// public function test_for_comenting()
	// {
	// 	Review::Create([
	// 	'user_id'=>5,
	// 	'craft_id'=>2,
	// 	'comment'=>'nice work this is testing',
	// 	'tittle'=>'nice',
	// 	'rating'=>4]
	// 				);
	
	// 	$this->assertDatabaseHas('reviews', ['tittle'=>'nice']);

	// }

	public function test_for_posting_question()
	{
		Question::Create([
			'question'=>'who is president of nepal',
			'like'=>0,
			'dislike'=>0,
			'user_id'=>5
		]);

			$this->assertDatabaseHas('question', ['question'=>'who is president of nepal']);
	}



	public function test_for_answering()
	{
		Answer::Create([
			'answer'=>'Kp oli the paradox is president of nepal',
			'likes'=>2,
			'dislikes'=>3,
			'user_id'=>5,
			'question_id'=>3
		]);
		$this->assertDatabaseHas('answer', ['answer'=>'Kp oli the paradox is president of nepal']);
	}
}