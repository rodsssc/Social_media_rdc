@extends('layouts.app')

@section('navbar')
@endsection

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center mt-5"> <!-- Flex column for vertical stacking -->

    <!-- Form Section -->

        <form action="{{ route('index.store')}}" method="POST" class="w-50" enctype="multipart/form-data">
            @csrf
            <div class="form-floating position-relative">
                <textarea class="form-control mt-3" placeholder="Leave a comment here" style="height: 150px;" id="floatingTextarea" name="content"></textarea>
                <label for="floatingTextarea">What's on your mind?</label>
                <div class="mb-3">
                    <input class="form-control mt-3" type="file" name="image" id="formFile">
                </div>
                <div class="text-end mt-3">
                    <button class="btn btn-primary" style="width: 100px">Post</button>
                </div>
            </div>  
        </form>
        <hr class="border border-primary border-3 opacity-75" style="width: 650px">
    <!-- Card Section -->
    @foreach ($posts as $post)
    <div class="card" style="width: 40rem; margin:20px">
        <img src="{{ $post->image}}" class="card-img-top" alt="..." style="height: 400px">
        <div class="card-body">
          <h5 class="card-title">{{ $post->user->name}}</h5>
          <small><p style="margin-left:500px; margin-top:-30px">{{ $post->created_at->diffForHumans()}}</p></small>
          <p class="card-text">{{ $post->content}}</p>
          <form action="{{route('comment.show',$post->id)}}" method="GET">
             <button class="btn btn-primary" type="submit">Comment</button>
        </form>
        </div>
      </div>
    @endforeach
</div>
@endsection
