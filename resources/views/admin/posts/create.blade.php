@extends('admin.master')

@section('title' , 'posts | Admin')

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
        <h1>{{ __('site.Add posts') }}</h1>
    </div>

    <br>

 @include('admin.errors')

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

            {{-- Title --}}
            <div class="row">
            {{-- title english --}}
            <div class="col-md-6">
            <div class="mb-3">
            <label>{{ __('site.English Title') }}</label>
            <input type="text" name="title_en" placeholder="{{ __('site.English Title') }}" class="form-control">
            </div>
            </div>

            {{-- title Arabic --}}
            <div class="col-md-6">
            <div class="mb-3">
            <label>{{ __('site.Arabic Title') }}</label>
            <input type="text" name="title_ar" placeholder="{{ __('site.Arabic Title') }}" class="form-control">
            </div>
            </div>
            </div>

            {{--image --}}
            <div class="mb-3">
                <label>{{ __('site.Image') }}</label>
                <input type="file" name="image"  class="form-control">
            </div>

            {{-- description --}}
            <div class="row">

            {{-- description english --}}
            <div class="col-md-6">
            <div class="mb-3">
            <label>{{ __('site.English Description') }}</label>
            <textarea name="description_en" id="mytextarea" class="form-control" placeholder="{{ __('site.English Description') }}" ></textarea>
            </div>
            </div>

            {{-- description Arabic --}}
            <div class="col-md-6">
            <div class="mb-3">
            <label>{{ __('site.Arabic Description') }}</label>
            <textarea name="description_ar" id="mytextarea" class="form-control" placeholder="{{ __('site.Arabic Description') }}" ></textarea>
            </div>
            </div>

            </div>

            <br>
            <button class="btn btn-outline-primary w-25">{{ __('site.Add') }}</button>

    </form>



 @stop
