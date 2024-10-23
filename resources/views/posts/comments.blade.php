<hr>
    <!--======================================== start add comment part ===================================================-->
    @if(auth()->check())
        <form action="{{route('post.comment',$post->id)}}" method="Post">
            @csrf
            <div class="form-group">
                <textarea class="form-control" id="comment" placeholder="Enter comment" name="comment" required></textarea>
            </div>
            <center><button type="submit" class="btn btn-info">Add</button></center>
        </form>
    @endif
    <!--======================================== end add comment part ===================================================-->
    
    @if((count($comments))>0)
        <!--======================================== start display comments part ===================================================-->
        <br>
        <h3>Comments</h3>
        @foreach($comments as $comment)
            <div class="card" style="border-radius: 1.25rem;">
                <div class="card-body">
                    <strong>{{ $comment->commentator->name }}</strong>
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
        <br>
        @endforeach
        <!--======================================== start display comments part ===================================================-->
        
        <!--======================================== start pagination links  ===================================================-->
        <div class="d-flex justify-content-center mt-4">
            {{ $comments->links() }}
        </div>
        <!--======================================== end pagination links  =====================================================--> 
    @endif