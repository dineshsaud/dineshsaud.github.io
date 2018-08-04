@extends('layouts.blueprint')
@section('content')
<style> 
body{
background: #EBF5FB  ;
}</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 l-back"  >
            <div class="card c-log ">
                <div class="card-header"><b> {{ __('Login') }}</b> <i class="fa fa-lock"></i></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="lock"><img src="images/chabi.png" alt="chabi">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter your email here..." required autofocus>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Your password..." required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <div class="text-center">
                                    <label>
                                        <input class="form-check-inline" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="margin: unset;width: unset;"> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                         <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-info">
                                {{ __('Login') }} <i class="fa fa-arrow-right"></i>
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