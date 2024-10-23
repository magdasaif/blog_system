@extends('layouts.app')

@section('content')
  @include('layouts.alerts')
  <br>
  <!-- =========================== start update part========================================== -->
  <div class="container">
    <div class="card border-info mb-3">
      <div class="card-header bg-info text-white">
        Edit Post
      </div>
      <div class="card-body ">
        <form action="{{route('posts.update',$post)}}" method="Post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          @include('posts.form')
        </form>
      </div>
    </div>
  </div>
  <!-- =========================== end create part========================================== -->
@endsection