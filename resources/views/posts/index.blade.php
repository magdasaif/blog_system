@extends('layouts.app')

@section('content')
    @include('layouts.alerts')
    <br>
    <div class="container">
        <h2>{{auth()->user()->name }} Posts</h2>
        <br>
        @foreach($posts as $post)
            <div class="card border-info mb-3">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <div>
                        {{$post->title}}
                    </div>
                    <div>
                        <a href="#" class="text-white mr-3"><i class="fas fa-edit"></i></a>
                        <a href="#" class="text-white delete-action"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                    
                <div class="card-body text-info d-flex justify-content-between align-items-center">
                    <div><p class="card-text"> {{ substr($post->content,0,100)}}..</p></div>
                    <div><img src="{{$post->getFirstMediaUrl('post_collection','thumb')}}" class="rounded-circle" alt="Post Image"></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection