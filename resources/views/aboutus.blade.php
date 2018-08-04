@extends('layouts.blueprint')
@section('content')
<style>
body{
background: #EBF5FB ;
}
</style>
<div class="container " style="background: #F9FAFA;margin-top: 10px;">
  <div class=" row first  h-100" style="height:800px;">
    <div class="col-sm-6 p-0 " style="height: auto; margin-right: 0px;">
      <img class=" w-100 h-100 " src="{{asset('images/baje2.jpg') }}" {{-- style="height: 400px; width:100px" --}} alt="about us page">
    </div>
    <div class="col-sm-6" >
      <div class="p-sm-5">
        <h2>Why In Nepal ?</h2>
        <br>
        As nepal is a contry with reach culture its people have very rare and beautiful skillset to trun anything on art. but due to man in the middle people have to extra burden and skilled personal are getting demotivated. As in nepal virtual curency have not fully implimented so we have build chat system for dealing.
        
      </div>
    </div>
  </div>
  <div class=" row second p-1 h-100" style="height:800px;">
    <div class="col-sm-6 w-100 h-100 float-left" >
      <div class="p-sm-5" >
        <h2>Our misson</h2>
        <br>
        
        This site doesnot intend to earn any profit and add extra burden cost on handicrafts.
        This site orginaly devlop to give the user the freedom to become real time transaction bettwen real customer and seller.
        sites intend to remove the man in the middle. this improves the modivation of users.
      </div>
    </div>
    <div class="col-sm-6 p-0 " style="height: auto; margin-right: 0px;">
      <img class=" w-100 h-100 " src="{{asset('images/khtra.jpg') }}" {{-- style="height: 400px; width:100px" --}} alt="about us page">
    </div>
    
  </div>
  
</div>
</div>



@endsection