@extends('admin.master')

@section('title' , 'categories | Admin')

@section('styles')
@if (app()->currentLocale() == 'ar')

<style>
        .row {
            direction: rtl;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px;
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
        <h1>{{ __('site.Add Categories') }}</h1>
    </div>
    <br>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ seddion('msg') }}
        </div>
    @endif
    @include('admin.errors')
<form action="{{ route('admin.categories.update' , $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

        {{-- name --}}
        <div class="row">
        {{-- name english --}}
        <div class="col-md-6">
        <div class="mb-3">
        <label>{{ __('site.English Name') }}</label>
        <input type="text" name="name_en" placeholder="{{ __('site.English Name') }}" class="form-control" value="{{ $category->name_en }}">
        </div>
        </div>
        {{-- name Arabic --}}
        <div class="col-md-6">
        <div class="mb-3">
        <label>{{ __('site.Arabic Name') }}</label>
        <input type="text" name="name_ar" placeholder="{{ __('site.Arabic Name') }}" class="form-control" value="{{ $category->name_ar }}">
        </div>
        </div>
        </div>

        {{--image --}}
        <div class="mb-3">
        <label>{{ __('site.Image') }}</label>
        <input type="file" name="image"  class="form-control">
        <img width="70" src="{{ asset('uploads/categories/'.$category->image) }}" alt="">
        </div>

        {{-- parent category --}}
        <div class="mb-3">
        <label>{{ __('site.Parent') }}</label>
        <br>
        <select  name="parent_id" class="form-control">
        {{-- <option value="" disabled selected>--Select Parent--</option> --}}
        <option value="">--{{ __('site.Select Parent') }}--</option>
        @foreach ($categories as $item )
            <option {{ $category->parent_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->trans_name }}</option>
        @endforeach
        </select>
        </div>

        <br>

        <button class="btn btn-outline-primary w-25">{{ __('site.Update') }}</button>
</form>



 @stop
