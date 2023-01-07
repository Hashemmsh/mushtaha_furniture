@extends('admin.master')

@section('title' , 'categories | Admin')

@section('content')


    <h1 class="">{{ __('site.All Categories') }}</h1>
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
        <th>{{ __('site.Parent') }}</th>
        <th>{{ __('site.Action') }}</th>
    </tr>
    @foreach ($categories as $category )
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->trans_name }}</td>
            <td><img width="70" src="{{ asset('uploads/categories/'.$category->image) }}" alt=""></td>
            <td>{{ $category->parent->trans_name }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.edit', $category->id) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <form class="d-inline" action="{{ route('admin.categories.destroy',$category->id) }}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>


    @endforeach
  </table>
  {{ $categories->links() }}
 @stop
