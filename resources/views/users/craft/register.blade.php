@extends('layouts.blueprint')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-muted">{{ __('Craft registration') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('craftregister') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" value="{{ session('auth')['id'] }}" hidden="" name="seller_id"> {{-- seller id --}}
                        
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
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" value="{{csrf_token()}}" name="image[]">
                                <input id="image" type="file" class="form-control" value="{{csrf_token()}}" name="image[]">
                                <input id="image" type="file" class="form-control" value="{{csrf_token()}}" name="image[]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __(' Price') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>
                                @if ($errors->has('price'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quntity" class="col-md-4 col-form-label text-md-right">{{ __('Quntity') }}</label>
                            <div class="col-md-6">
                                <input id="quntity" type="text" class="form-control{{ $errors->has('quntity') ? ' is-invalid' : '' }}" name="quntity" value="{{ old('quntity') }}" required autofocus>
                                @if ($errors->has('quntity'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('quntity') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="HandiCraftType" class="col-md-4 col-form-label text-md-right">{{ __('HandiCraft Type') }}</label>
                            <div class="col-md-6">
                                <select name="handicrafttype" id="handicraft" class="form-control">
                                    <option id="papercraft" value="Paper craft">Paper craft</option>
                                    <option id="papercraft" value="Ceramics and Glass">Ceramics and Glass</option>
                                    <option id="papercraft" value="Fiber and Textile">Fiber and Textile</option>
                                    <option id="papercraft" value="Flower craft">Flower craft</option>
                                    <option id="papercraft" value="Leather craft">Leather craft</option>
                                    <option id="papercraft" value="Mix Media">Mix Media</option>
                                    <option id="papercraft" value="Needle Work">Needle Work</option>
                                    <option id="papercraft" value="wooden and Furniture">wooden and Furniture</option>
                                    <option id="papercraft" value="Stone craft">Stone craft</option>
                                    <option id="papercraft" value="Metal Craft">Metal Craft</option>
                                    
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description ') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" rows="5"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required ></textarea>    
                                @if ($errors->has('description'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
<br>
@endsection