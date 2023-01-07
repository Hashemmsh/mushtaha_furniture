
@extends('site.master')
@section('title' , 'Categories -' . config('app.name'))
@section('content')

<body>







    <!-- ======= Services Section ======= -->
@foreach ($categories as $category )


<section class="product-category section">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="title text-center">
                  <h2>Category</h2>
              </div>
          </div>
          <div class="col-md-6">
              <div class="category-box">
                  <a href="#">

                      <div class="content">
                          <h3>{{ $category->trans_name }}</h3>
                          <img src="{{ asset('uploads/categories/'.$category->image) }}" alt="" />
                      </div>
                  </a>
              </div>
          </div>
      </div>
  </div>
</section>
@endforeach



{{-- <section id="services" class="services">
  <div class="container">

    <div class="row">

      <div class="col-md-6">
        <img width="70px" src="{{ $category->image }}" alt="">
        <div class="icon-box">
          <h4><a href="#">{{ $category->trans_name }}</a></h4>
        </div>
      </div>
    </div>

  </div>
</section><!-- End Services Section --> --}}




@stop



