@extends('layouts.app')

@section('content')
    @include('layouts.alerts')
    <br>
    <div class="container">
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <div>
                    {{$post->title}}
                </div>
                <div>
                    @if(auth()->check() && auth()->user()->id == $post->user_id)
                        <a href="{{route('posts.edit',$post->id)}}" class="text-white mr-3"><i class="fas fa-edit"></i></a>
                        <a class="text-white" data-toggle="modal" data-target="#deleteModal_{{$post->id}}" title="delete post"><i class="fas fa-trash-alt"></i></a>
                    @endif
                </div>
            </div>
            <div class="card-body text-info justify-content-between align-items-center">
                @if(isset($post_image) && !empty($post_image))
                    <center><img src="{{$post_image}}" alt="Post Image"></center>
                @endif
                <div>
                    <label style="color: black;">Author : {{$post->user->name}}</label><br>
                    <label style="color: black;">Creation Date. : {{$post->created_at}}</label>
                    <hr>
                    <p class="card-text"> {{ $post->content}}</p>
                </div>
                <!-- =========================== start comments part========================================== -->
                @include('posts.comments')
                <!-- =========================== end comments part========================================== -->
            </div>
        </div>
        <!-- =========================== start delete Modal part========================================== -->
        @php
            $route='posts';
            $id=$post->id
        @endphp
        @include('delete_modal')
        <!-- =========================== end delete Modal part========================================== -->
    </div>
@endsection