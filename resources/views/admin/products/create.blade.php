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

    {{-- adress page --}}
    <div class="col-sm-6">
        <h1>{{ __('site.Add products') }}</h1>
    </div>

    <br>
    {{-- @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ seddion('msg') }}
    </div>
    @endif --}}
 @include('admin.errors')

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- name --}}
        <div class="row">
            {{-- name english --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>{{ __('site.English Name') }}</label>
                        <input type="text" name="name_en" placeholder="{{ __('site.English Name') }}" class="form-control">
                    </div>
                </div>

            {{-- name Arabic --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>{{ __('site.Arabic Name') }}</label>
                        <input type="text" name="name_ar" placeholder="{{ __('site.Arabic Name') }}" class="form-control">
                    </div>
                </div>
        </div>

        {{--image --}}
        <div class="mb-3">
            <label>{{ __('site.Image') }}</label>
            <input type="file" name="image"  class="form-control">
        </div>

        {{-- content --}}
        <div class="row">
            {{-- content english --}}
            <div class="col-md-6">
                <div class="mb-3">
                    <label>{{ __('site.English Content') }}</label>
                    <textarea name="content_en" placeholder="{{ __('site.English Content') }}" class="form-control customarea"></textarea>
                </div>
            </div>
            {{-- content Arabic --}}
            <div class="col-md-6">
                <div class="mb-3">
                    <label>{{ __('site.Arabic Content') }}</label>
                    <textarea name="content_ar" placeholder="{{ __('site.Arabic content') }}" class="form-control customarea"></textarea>
                </div>
            </div>
        </div>

        {{-- price --}}
        <div class="mb-3">
        <label>{{ __('site.Price') }}</label>
        <input type="number" name="price"  placeholder="{{ __('site.Price') }}"  class="form-control">
        </div>

        {{-- category --}}
        <div class="mb-3">
            <label>{{ __('site.Category') }}</label>
            <br>
            <select  name="category_id" class="form-control">
                {{-- <option value="" disabled selected>--Select Parent--</option> --}}
                <option value="">--{{ __('site.Select Parent') }}--</option>
                @foreach ($categories as $category )
                    <option value="{{ $category->id }}">{{ $category->trans_name }}</option>
                @endforeach
            </select>
        </div>

            <br>
            <button class="btn btn-outline-primary w-25">{{ __('site.Add') }}</button>
    </form>

 @stop
