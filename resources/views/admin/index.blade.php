
@extends('admin.master')
@section('title', 'Dashbord | Admin')

@section('content')
@if (app()->currentLocale() == 'ar')

<style>
       .row {

   direction: rtl;
       }
</style>

@endif

        <div class="info-box">
            <span class="info-box-icon bg-success">   <i class="fas fa-tags"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{ __('site.Categories') }}</span>
              <span class="info-box-number">{{ $c_count }}</span>
            </div>
        </div>

        <div class="info-box">
            <span class="info-box-icon bg-red">  <i class="fas fa-heart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{ __('site.Products') }}</span>
              <span class="info-box-number">{{ $p_count }}</span>
            </div>
        </div>

        <div class="info-box">
            <span class="info-box-icon bg-info"> <i class="fas fa-mail-bulk"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{ __('site.Posts') }}</span>
              <span class="info-box-number">{{ $po_count }}</span>
            </div>
        </div>


@stop
