@extends('layouts.blueprint')
@section('content')
<style>
body{
background: #EBF5FB  ;
}
</style>
<div class="container"  style="background:#F9FAFA">
  <div class="row  mt-3" style="background: #E5E7E9;">
    <div class="col-md-12 col-lg-12 text-center">
      <h3 class="mt-3">Welcome !!</h3>
      <p class=" text-justify text-left">
        Here are the user guidelines for the user who have no experince in using website before. every functionality of the website are guidede sincerely for users.
      </p>
    </div>
  </div>
  <section class="mt-2">
    
    <div class="row mt-3">
      <div class="col-sm-8 p-5">
        <div>
          <h4>Step 1</h4>
          <p>
            a. <a href="/register">Register</a> <br>
            b. <a href="/login">Log in</a> <br>
          </p>
        </div>
      </div>
      <div class="col-sm-4">
        <div >
          <img  src="{{asset('uploads/guide/profile.png') }}" alt="step 1 image" class="img-fluid" >
        </div>
      </div>
    </div>
    <hr class="mt-0 mb-0 bg-dark">
    <h3>Craft Operations</h3>
    <hr class="mt-0 mb-0 bg-primary">
    <div class="row mt-3">
      <div class="col-sm-8 p-3">
        <div>
          <h4>User menu</h4>
          <p>
            
            Step 1 : you can see your registerd crafts and register more crafts<br>
            Step 2 : User can edit thair own information
          </p>
        </div>
      </div>
      <div class="col-sm-4">
        <div>
          <img  src="{{asset('uploads/guide/registercraft.png') }}" alt="step 1 image" class="img-fluid" >
        </div>
      </div>
    </div>
    <hr class="mt-0 mb-0 bg-dark">
    <div class="row mt-3">
      <div class="col-sm-8 p-3">
        <div>
          <h4>To Delete craft</h4>
          <p>
            Step 1 : Go to craft List<br>
            Step 2 : Click on the delete icon<br>
            
          </p>
        </div>
      </div>
      <div class="col-sm-4">
        <div>
          <img  src="{{asset('uploads/guide/deletecraft.png') }}" alt="step 1 image" class="img-fluid" >
        </div>
      </div>
    </div>
    <hr class="mb-0 mt-2 bg-dark">
    <div class="row mt-3">
      <div class="col-sm-8">
        <div>
          <h4>Updating</h4>
          <p>
            Step 1: Go to craft list <br>
            Step 2: Click on the update icon <br>
            Step 3:  New Window will appear
          </p>
        </div>
      </div>
      <div class="col-sm-4">
        <div>
          <img src="{{asset('uploads/guide/editcraft.png') }}" alt="step 1 image" class="img-fluid" >
        </div>
      </div>
    </div>
    
    <hr class="mt-0 mb-0 bg-dark">
    <div class="row mt-3">
      <div class="col-sm-8">
        <div>
          <h4>To Update</h4>
          <p>
            Step 1: modify all the feilds that u want to modift<br>
            Step 2: click on the update button <br>
            Step 3: To exit click on the cross bar above<br>
          </p>
        </div>
      </div>
      <div class="col-sm-4">
        <div>
          <img  src="{{asset('uploads/guide/ecraftform.png') }}" alt="step 1 image" class="img-fluid" >
        </div>
      </div>
    </div>
    <hr class="mt-3 mb-0 bg-dark">
    <div class="row mt-3">
      <div class="col-sm-8">
        <div>
          <h4>Making Deals</h4>
          <p>
            Step 1: Go to the iteams detal u want to visit<br>
            Step 2: You can see the make deal button <br>
            Step 2: After clicking the make deal New Chat box will appear<br>
          </p>
        </div>
      </div>
      <div class="col-sm-4">
        <div>
          <img  src="{{asset('uploads/guide/makedeal.png') }}" alt="step 1 image" class="img-fluid" >
        </div>
      </div>
    </div>
    <hr class="mt-0 mb-0 bg-dark">
    <div class="row mt-3">
      <div class="col-sm-8">
        <div>
          <h4>Starting convresation </h4>
          <p>
            Step 1: type the message that u want to send<br>
            Step 2: after typing the  message click on send button<br>
            Step 3: then wait for reply of the seler<br>
          </p>
        </div>
      </div>
      <div class="col-sm-4">
        <div>
          <img  src="{{asset('uploads/guide/sendmsg.png') }}" alt="step 1 image" class="img-fluid" >
        </div>
      </div>
    </div>
    <hr class="mt-0 mb-0 bg-dark">
    <div class="row mt-3">
      <div class="col-sm-8">
        <div>
          <h4>Shipping methods</h4>
          <p>
            Step 1: Request quotes <br>
            Step 2: Choose the quote that you prefer <br>
            Step 3: Prepare necessary documents for the shipping process <br>
            Step 4: Confirm the shipment details <br>
            Step 5: Book your freight <br>
            Step 6: Pay with credit card or via bank account <br>
            Step 7: Shipment passes through customs inspection at port of entry <br>
            Step 8: Receive and pay the bill for customs duties and taxes
            <br>
            Step 9: Receive the shipment
          </p>
        </div>
      </div>
      <div class="col-sm-4 p-3 text-center">
        <div class="float-left p-5 align-content-center">
          <a href="http://www.tryfleet.com/blog/2017/06/07/whole-shipping-process-step-step#step-one" class="font-italic"> <i class="fas fa-info">
          &nbsp; &nbsp;</i> Detail procedure</a><br>
          <a href="http://www.shippingnepal.com/" class="font-italic"> <i class="fa fa-plane">&nbsp;</i> Shipping Services in Nepal</a> <br>
          <a href="https://www.shippingsolutions.com/blog/shipping-documentation-process" class="font-italic"><i class="far fa-handshake"></i>&nbsp; Documentation process</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection