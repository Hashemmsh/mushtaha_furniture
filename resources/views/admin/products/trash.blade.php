@extends('admin.master')

@section('title' , 'products | Admin')

@section('content')


    <h1 class="">{{ __('site.Trashed Products') }}</h1>
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
        <th>{{ __('site.Action') }}</th>
    </tr>

    @foreach ($products as $product )

        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->trans_name }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.products.restore', $product->id) }}"><i class="fas fa-undo"></i></a>
                <a onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger" href="{{ route('admin.products.forcedelete', $product->id) }}"><i class="fas fa-times"></i></a>

            </td>
        </tr>

    @endforeach
  </table>
 @stop
