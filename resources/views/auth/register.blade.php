@extends('layouts.blueprint')
@section('content')
<div class="container">
    <div class="row justify-content-center rform">
        <div class="col-md-8 l-back">
            <div class="card c-reg">
                <div class="card-header">{{ __('Register') }} <i class="fa fa-book"></i> </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __(' Phone Number') }}</label>
                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ old('phone_no') }}" required autofocus>
                                @if ($errors->has('phone_no'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row gen ">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md  float-left">
                                
                                <input id="male" type="radio" name="gender" value="male" >
                                <label for="male"  style="margin-left:-90px;">
                                    {{ __('Male') }}
                                </label>
                                
                                <input id="female" type="radio" name="gender" value="female">
                                <label for="female" style="margin-left:-90px;">
                                    {{ __('Female') }}
                                </label>
                                
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">
                                User Type
                            </label>
                            <div class="col-md-6">
                                <select class="form-control" name="user_type" id="user_type">
                                    <option value="customer">Customer</option>
                                    <option value="seller">Seller</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>
                            <div class="col-md-6">
                                <input id="age" type="date" class="form-control" name="dob" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                            <div class="col-md-6">
                                <input type="file" name="image" id="image" class="form-control-file">
                                @if($errors->has('image'))
                                <div class="alert alert-danger text-danger font-weight-bold w-50 " style=" margin-left: 75px"> Image Size is irrevelent</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 clearfix">
                                <button type="submit" class="btn btn-info">
                                {{ __('Register') }}
                                </button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection