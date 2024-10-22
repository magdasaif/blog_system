@extends('layouts.app')

@section('content')
    @include('layouts.alerts')
    <br>
    <div class="container">
        <h2>{{$title}}</h2>
        <br>
        <!--======================================== start no data part =========================================================-->
        @if(count($posts)==0)
            <div class="card mb-3">
                <div class="card-header">
                    @if(auth()->check())
                        @if(!empty(Request()->search)) No Result ! @else No Posts Added Yet ! @endif
                    @else
                    No Result !
                    @endif
                </div>
                @if(auth()->check())
                    <div class="card-body ">
                        <h5 class="card-title">Let's add new post... </h5>
                        <center><button type="button" class="btn btn-success" onclick="window.location.href='/posts/create'">Add Post</button></center>
                    </div>
                @endif
            </div>
        @endif
        <!--======================================== end no data part ============================================================-->
        <!--======================================== start display posts part ====================================================-->
        @foreach($posts as $post)
            <div class="card border-info mb-3">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <div>
                        {{$post->title}}
                    </div>
                    <div>
                        <a href="{{route('posts.show',$post->id)}}" class="text-white mr-3"><i class="fas fa-eye"></i></a>
                        @if(auth()->check() && auth()->user()->id == $post->user_id)
                            <a href="{{route('posts.edit',$post->id)}}" class="text-white mr-3"><i class="fas fa-edit"></i></a>
                            <a class="text-white" data-toggle="modal" data-target="#deleteModal_{{$post->id}}" title="delete post"><i class="fas fa-trash-alt"></i></a>
                        @endif
                    </div>
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
            <!--======================================== start modal  ==========================================================-->
            @php
                $route='posts';
                $id=$post->id
            @endphp
            @include('delete_modal')
            <!--======================================== end modal  ============================================================-->
        @endforeach
        <!--======================================== end display posts part ====================================================-->
        
        <!--======================================== start pagination links  ===================================================-->
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
        <!--======================================== end pagination links  =====================================================-->
    </div>
@endsection