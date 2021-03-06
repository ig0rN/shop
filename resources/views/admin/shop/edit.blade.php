@extends('layouts.app')

@section('title', 'Update Shop')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">

            <div class="card-header clearfix text-center">
                <div class="float-left">
                    <a href="{{ route('admin.shop') }}">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
                Edit Shop
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('admin.shop.update', ['shop' => $shop->id]) }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 offset-3">
                            <label for="name" class="form-label">Shop name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $shop->name }}">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-6 offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>
@endsection
