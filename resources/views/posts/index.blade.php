@extends('layouts.app')

@section('content')
@include('layouts.alerts')
<br>
<div class="container">
    <h2>{{$title}}</h2>
    <br>
    @if(auth()->check() && count($posts)==0)
    <div class="card mb-3">
        <div class="card-header">
            No Posts Added Yet !
        </div>
        <div class="card-body ">
            <h5 class="card-title">Let's add new post... </h5>
            <center><button type="button" class="btn btn-success" onclick="window.location.href='/posts/create'">Add Post</button></center>
        </div>
    </div>
    @endif
    @foreach($posts as $post)
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <div>
                    {{$post->title}}
                </div>
                @if(auth()->check() && auth()->user()->id == $post->user_id)
                    <div>
                        <a href="{{route('posts.edit',$post->id)}}" class="text-white mr-3"><i class="fas fa-edit"></i></a>
                        <a class="text-white" data-toggle="modal" data-target="#deleteModal_{{$post->id}}" title="delete post"><i class="fas fa-trash-alt"></i></a>
                    </div>
                @endif
            </div>
            <div class="card-body text-info d-flex justify-content-between align-items-center">
                <div>
                    <label style="color: black;">Author : {{$post->user->name}}</label>
                    <p class="card-text"> {{ substr($post->content,0,100)}}..</p>
                </div>
                <div>
                    @php
                        $post_image=$post->getFirstMediaUrl('post_collection','thumb');
                    @endphp
                    @if(isset($post_image) && !empty($post_image))
                        <img src="{{$post_image}}" class="rounded-circle" alt="Post Image">
                    @endif
                </div>
            </div>
        </div>
        <!-- Modal -->
        @php
            $route='posts';
            $id=$post->id
        @endphp
        @include('delete_modal')
        <!--  -->
    @endforeach
</div>
@endsection