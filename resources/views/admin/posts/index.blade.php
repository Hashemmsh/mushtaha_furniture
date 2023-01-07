@extends('admin.master')

@section('title' , 'posts | Admin')

@section('content')



    <h1 class="">{{ __('site.All posts') }}</h1>
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
        <th>{{ __('site.Image') }}</th>
        <th>{{ __('site.Description') }}</th>
        <th>{{ __('site.Created At') }}</th>
        <th>{{ __('site.Updated At') }}</th>
        <th>{{ __('site.Action') }}</th>
    </tr>
    @foreach ($posts as $post )
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->trans_title }}</td>
            <td><img width="70" src="{{ asset('uploads/posts/'.$post->image) }}" alt=""></td>
            <td>{{ $post->trans_description }}</td>
            <td>{{ $post->created_at->format('M d, Y') }}</td>
            <td>{{ $post->updated_at->diffForHumans()}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <form class="d-inline" action="{{ route('admin.posts.destroy',$post->id) }}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>


    @endforeach
  </table>
  {{ $posts->links() }}
 @stop
