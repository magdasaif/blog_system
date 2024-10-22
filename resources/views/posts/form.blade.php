<div class="form-group">
  <label for="title">Title <span style="color:red">*</span></label>
  <input type="input" class="form-control" id="title" placeholder="Enter Title" name="title" @if(isset($post)) value="{{$post->title}}" @else value="{{old('title')}}" @endif required>
</div>

<div class="form-group">
  <label for="content">Content <span style="color:red">*</span></label>
  <textarea class="form-control" id="content" placeholder="Enter Content" name="content" required>@if(isset($post)) {{$post->content}} @else {{old('content')}} @endif</textarea>
</div>

<div class="form-group">
  <label for="image">image</label><br>
  @if(isset($post) && !empty($post->getFirstMediaUrl('post_collection','thumb')))
    <img src="{{$post->getFirstMediaUrl('post_collection','thumb')}}"  alt="Post Image"><br>
  @endif
  <input type="file" class="form-control" id="image" name="image">
</div>

<button type="submit" class="btn btn-success">Save</button>
<button type="button" class="btn btn-danger">Cancel</button>