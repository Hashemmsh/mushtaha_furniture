@extends('admin.master')

@section('title' , 'posts | Admin')

@section('content')


    <h1 class="">{{ __('site.Trashed Posts') }}</h1>
      <br>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
        </div>

    @endif

  <table class="table table-bordered table-striped table-hover">

    <tr>
        <th>{{ __('site.Id') }}</th>
        <th>{{ __('site.Title') }}</th>
        <th>{{ __('site.Action') }}</th>
    </tr>

    @foreach ($posts as $post )

        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->trans_title }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.restore', $post->id) }}"><i class="fas fa-undo"></i></a>
                <a onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger" href="{{ route('admin.posts.forcedelete', $post->id) }}"><i class="fas fa-times"></i></a>

            </td>
        </tr>

    @endforeach

  </table>

 @stop
