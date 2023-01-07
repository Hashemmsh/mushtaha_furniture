@extends('admin.master')

@section('title' , 'products | Admin')

@section('styles')
@if (app()->currentLocale() == 'ar')

<style>
        .row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;
    direction: rtl;
        }
</style>
@endif
    <style>
        form{
            margin: 20px;
        }
        form div{
            margin: 5px 0px;
        }
    </style>

@section('content')


    <div class="col-sm-6">
        <h1>{{ __('site.Update products') }}</h1>
    </div>
    <br>
    {{-- @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ seddion('msg') }}
    </div>
    @endif --}}
    @include('admin.errors')
<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

        {{-- name --}}
        <div class="row">
        {{-- name english --}}
        <div class="col-md-6">
        <div class="mb-3">
        <label>{{ __('site.English Name') }}</label>
        <input type="text" name="name_en" placeholder="{{ __('site.English Name') }}" class="form-control" value="{{ $product->name_en }}">
        </div>
        </div>
        {{-- name Arabic --}}
        <div class="col-md-6">
        <div class="mb-3">
        <label>{{ __('site.Arabic Name') }}</label>
        <input type="text" name="name_ar" placeholder="{{ __('site.Arabic Name') }}" class="form-control" value="{{ $product->name_ar }}">
        </div>
        </div>
        </div>

        {{--image --}}
        <div class="mb-3">
        <label>{{ __('site.Image') }}</label>
        <input type="file" name="image"  class="form-control">
        <img width="80" src="{{ asset('uploads/products/'.$product->image) }}" alt="">
        </div>

        {{-- content --}}
        <div class="row">
            {{-- content english --}}
            <div class="col-md-6">
            <div class="mb-3">
            <label>{{ __('site.English Content') }}</label>
            <textarea  name="content_en" placeholder="{{ __('site.English Content') }}" class="form-control customarea">{{ $product->content_en }}</textarea>
            </div>
            </div>
            {{-- content Arabic --}}
            <div class="col-md-6">
            <div class="mb-3">
            <label>{{ __('site.Arabic Content') }}</label>
            <textarea name="content_ar" placeholder="{{ __('site.Arabic content') }}" class="form-control customarea">{{ $product->content_ar }}</textarea>
            </div>
            </div>
        </div>

        {{-- price --}}
        <div class="mb-3">
        <label>{{ __('site.Price') }}</label>
        <input type="number" name="price"  placeholder="Price"  class="form-control" value="{{ $product->price }}">

        </div>

        {{-- category --}}
        <div class="mb-3">
        <label>{{ __('site.Category') }}</label>
        <br>
        <select  name="category_id" class="form-control">
        {{-- <option value="" disabled selected>--Select Parent--</option> --}}
        <option value="">--{{ __('site.Select Parent') }}--</option>
        @foreach ($categories as $item )
        <option {{ $product->category_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->trans_name }}</option>
        @endforeach
        </select>
        </div>

        <br>
        <button class="btn btn-outline-primary w-25">{{ __('site.Update') }}</button>
</form>

 @stop
