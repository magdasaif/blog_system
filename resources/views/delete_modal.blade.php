<!-- Modal -->
<!-- <div class="modal fade" id="deleteModal_{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route($route.'.destroy',$id)}}" method="Post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="col-md-12">
                        <center>
                            <h2>
                                Are You Sure Deleteing This Post ?
                            </h2>
                        </center>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!--  -->


<!-- Modal -->
<div class="modal fade" id="deleteModal_{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route($route.'.destroy',$id)}}" method="Post">
            <div class="modal-body">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <div class="col-md-12">
                            <center>
                                <h2>
                                    Are You Sure Deleteing This Post ?
                                </h2>
                            </center>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>