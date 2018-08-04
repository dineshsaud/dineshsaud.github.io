<form method="POST" action="{{ route('craft.update', ['id'=> $product['id']]) }}" enctype="multipart/form-data" class="table-bordered py-3">
    @csrf
    <input type="text" value="{{ auth()->id() }}" hidden="" name="user_id"> {{-- seller id --}}
    
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        <div class="col-md-6">
            <input id="name" type="text" 
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $product['name'] }}" required autofocus>
            @if ($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __(' Price') }}</label>
        <div class="col-md-6">
            <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $product['price'] }}" required autofocus>
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
            <input id="quntity" type="text" class="form-control{{ $errors->has('quntity') ? ' is-invalid' : '' }}" name="quntity" value="{{ $product['quntity'] }}" required autofocus>
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
               @foreach(craft_categories() as $cat)
               <option value="{{$cat}}" class="text-capitalize">{{$cat}}</option>
               @endforeach
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description ') }}</label>
        <div class="col-md-6">
            <textarea id="description" rows="5"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required >{{ $product['description'] }}</textarea>
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
            {{ __('Update') }}
            </button>
        </div>
    </div>
</form>