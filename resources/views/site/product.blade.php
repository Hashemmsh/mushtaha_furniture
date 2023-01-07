@extends('site.master')
@section('title' , 'Products -' . config('app.name'))
@section('content')

@section('styles')
<style>
  section{
    /* widows: 50px; */

    display: inline-flexbox;


  }

</style>
@stop



     @foreach ($products as  $product)
    <section>
            <div class="pro">
              <div class="portfolio-wrap">
                <img  src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid" alt="">
              </div>
            </div>
          </section>
  @endforeach




 @stop
