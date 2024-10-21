@extends('layouts.app')

@section('content')
  @include('layouts.alerts')
  <br>
  <div class="container">
    <h2>Add Post</h2>
    <br>
    <form action="{{route('posts.store')}}" method="Post" enctype="multipart/form-data">
      @csrf
      @include('posts.form')
    </form>
  </div>
@endsection