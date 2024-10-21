@extends('layouts.app')

@section('content')
@include('layouts.alerts')

<div class="container">
  <h2>Add Post</h2>
  
  <form action="{{route('posts.store')}}" method="Post" enctype="multipart/form-data">
    @csrf
    @include('posts.form')
  </form>
</div>
@endsection