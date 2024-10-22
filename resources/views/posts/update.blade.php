@extends('layouts.app')

@section('content')
  @include('layouts.alerts')
  <br>
  <div class="container">
    <h2>Edit Post</h2>
    <br>
    <form action="{{route('posts.update',$post)}}" method="Post" enctype="multipart/form-data">
      @csrf
      @method('patch')
      @include('posts.form')
    </form>
  </div>
@endsection