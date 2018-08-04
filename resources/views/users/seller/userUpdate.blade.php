@extends('layouts.blueprint')
@section('content')
<div class="container">
    <div class="row justify-content-center userupdate l-back ">
        <div class=" u-update" ">
            <form class="" action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-2 form-group ">
                    <img class="table-bordered" src="/{{ $user->image ? $user->image : asset('images/img_3.jpg') }}"  alt="{{$user->name}}">
                </div>
                <hr>
                <input type="number" name="id" value="{{$user->id}}" hidden="">
                <small>Name</small><input class="form-control text-capitalize" name="name" type="text" value="{{ $user->name }}">
                @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
                
                <br>
                <label for="image"> chose Image</label>
                <input class="form-control" id="image" type="file" name="image"  >
               @if($errors->has('image'))
                <div class="alert alert-danger text-danger font-weight-bold w-50 " style=" margin-left: 75px"> Image Size is irrevelent</div>
                @endif
                <i class="fa fa-envelope"></i>_Email: <input name="email" class="form-control" type="text" value="{{ $user->email }} ">
                <i class="fa fa-location-arrow"></i>_Address: <input name="address" class="form-control" type="text" value="{{ $user->address }} ">
                <i class="fa fa-phone">_Contact</i><input name="phone_no" class="form-control" type="text" value="{{ $user->phone_no }} ">
                @if($user->user_type=='seller')
                <i class="fa fa-cart-plus">_</i>   Total Products: {{ $user->crafts->count()}}
                @endif
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
            <hr>
        </div>
    </div>
</div>
@endsection