<?php
function craft_categories()
{
	return [
		'1'	=> 'Paper craft',
		'2'	=> 'Ceramics and Glass',
		'3'	=> 'Fiber and Textile',
		'4' => 'Flower craft',
		'5' => 'Leather craft',
		'6' => 'Mix Media',
		'7' => 'Needle Work',
		'8' => 'wooden and Furniture',
		'9' => 'Stone craft',
		'10' => 'Metal Craft'
	];
}
function price()
{
	return [
		500,
		1000,
		1500,
		2000,
		2500,
		3000,
		5000,
		10000,
		20000
	];
}
function rating_text($value)
{
	if($value>4)
		return 'Execellent Ratings!!';
	else if($value>3)
		return 'Good Ratings!!';
	else if($value>2)
		return 'Average Ratings!!';
	else if($value>1)
		return 'Not Bad!!';
	else
		return 'Poor Ratings!!';
}