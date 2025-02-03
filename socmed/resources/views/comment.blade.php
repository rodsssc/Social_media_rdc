@extends('layouts.app')

@section('navbar')


@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center mt-5">
            <div class="card" style="width: 40rem; margin:20px">
                <img src="{{ asset($posts->first()->image) }}" class="card-img-top" alt="..." style="height: 205px">
                <div class="card-body">
                    <h5 class="card-title">{{ $posts->user->name }}</h5>
                    <small>
                        <p style="margin-left:500px; margin-top:-30px">{{ $posts->created_at->diffForHumans() }}</p>
                    </small>
                    <p class="card-text">{{ $posts->content }}</p>

                </div>
            </div>

            <div>
                <p class="font-monospace">User<span></span></p>
                <hr style="width: 650px;">
            </div>

            <form action="{{ route('comment.store')}}" method="POST">
                @csrf
                <div class="input-group input-group-lg">
                    <input type="hidden" name="post_id" value="{{ $posts->id}}">
                    <input type="text" name="content" class="form-control" style="width: 650px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Post Comment">
                    <button class="btn btn-primary" type="submit">Comment</button>
                </div>
                
            </form>
    </div>
    @endsection
