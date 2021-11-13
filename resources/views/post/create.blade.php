@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1  class="text-center">Add (create post)</h1>
    <div>
   <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
       @csrf
    <div class="form-group">
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label class="mb-2" for="post" style="color=bold"><b>Write your post here!</b></label>
        <textarea id="post" name="post"  class="form-control" style="resize: none" rows="3">{{ old('post') }}</textarea>
    </div>
    </div>

    <div><button type="submit" class="btn btn-secondary mt-2">submit</button></div>
   </form>
   </div>
</div>
@endsection