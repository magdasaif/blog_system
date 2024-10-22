@extends('layouts.app')

@section('content')
@include('layouts.alerts')
  <br>
  <div class="container">
    <div class="card border-info mb-3">
      <div class="card-header bg-info text-white">
        Add Post
      </div>
      <div class="card-body ">
        <form action="{{route('posts.store')}}" method="Post" enctype="multipart/form-data">
          @csrf
          @include('posts.form')
        </form>
      </div>
    </div>
  </div>
@endsection