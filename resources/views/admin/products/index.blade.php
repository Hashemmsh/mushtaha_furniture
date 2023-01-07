@extends('admin.master')

@section('title' , 'categories | Admin')

@section('content')


    <h1 class="">{{ __('site.All products') }}</h1>
    <br>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
        </div>

    @endif
  <table class="table table-bordered table-striped table-hover">

    <tr>
        <th>{{ __('site.Id') }}</th>
        <th>{{ __('site.Name') }}</th>
        <th>{{ __('site.Image') }}</th>
        <th>{{ __('site.Content') }}</th>
        <th>{{ __('site.Price') }}</th>
        <th>{{ __('site.Category') }}</th>
        <th>{{ __('site.Action') }}</th>
    </tr>
    @foreach ($products as $product )
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->trans_name }}</td>
            <td><img width="70" src="{{ asset('uploads/products/'.$product->image) }}" alt=""></td>
            <td>{{ $product->trans_content }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category->trans_name }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.products.edit', $product->id) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <form class="d-inline" action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>


    @endforeach
  </table>
  {{ $products->links() }}
 @stop
