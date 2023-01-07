@extends('admin.master')

@section('title' , 'categories | Admin')

@section('content')


    <h1>{{ __('site.Trashed Categories') }}</h1>
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
    @foreach ($categories as $category )
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->trans_name }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.restore', $category->id) }}"><i class="fas fa-undo"></i></a>
                <a onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger" href="{{ route('admin.categories.forcedelete', $category->id) }}"><i class="fas fa-times"></i></a>

            </td>
        </tr>


    @endforeach
  </table>

 @stop
