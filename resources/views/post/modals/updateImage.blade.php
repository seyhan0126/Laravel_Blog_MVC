<form action="{{ route('image.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}
     <div class="modal fade" id="ModalEditImage" tabindex="-1" role="dialog" aria-hidden="true" >
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">
                         {{ __('Edit Delete') }}
                     </h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                    <div class="card mt-3 w-100 ">
                                <div class="form-group">
                                <input type="file" name="image">
                                </div>
                    </div>
                 </div>
                 <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger" >{{ __('Update') }}</button>
                    <button type="button" class="btn bray btn-outline-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                 </div>
             </div>    
         </div>
     </div>
 </form>