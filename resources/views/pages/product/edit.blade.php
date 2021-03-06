@extends('layouts.app')

@section('title', 'Update Product')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">

            <div class="card-header clearfix text-center">
                <div class="float-left">
                    <a href="{{ route('product') }}">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
                Edit Product
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="article_code" class="form-label">Unique Article Code</label>
                            <input id="article_code" type="text" class="form-control{{ $errors->has('article_code') ? ' is-invalid' : '' }}" name="article_code" value="{{ $product->article_code }}">

                            @if ($errors->has('article_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('article_code') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Product name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $product->name }}">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('category_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input id="price" type="number" min=0 class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $product->price }}">

                            @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $product->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label">Image</label>
                            <input id="image" type="file" name="image">

                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    @include('errors')
                    
                    <div class="form-group row">
                        <div class="col-md-6 offset-3 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>

            </div>
            <div class="card">
                <div class="card-body" style="margin: 0 auto;">
                    <img src="{{ asset($product->image_path) }}" alt="{{ $product->image_path }}" width="650">
                </div>
            </div>
            
        </div>

    </div>
</div>
@endsection
