<form action="{{ route('post.destroy', $post->id)}}" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
     <div class="modal fade" id="ModalDelete{{ $post->id }}" tabindex="-1" role="dialog" aria-hidden="true" >
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">
                         {{ __('Post Delete') }}
                     </h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     You sure you want to delete this post with id -> <b>{{ $post->id }}</b> ?
                 </div>
                 <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger" >{{ __('Delete') }}</button>
                    <button type="button" class="btn bray btn-outline-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                 </div>
             </div>    
         </div>
     </div>
 </form>