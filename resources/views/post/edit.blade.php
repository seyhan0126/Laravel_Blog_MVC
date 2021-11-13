@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="text-center">Edit (update post)</h1>
        <div>
            <form action={{ route('post.update',$post->id) }} method="POST">
                @method('PUT')
                @csrf
               
                <div class="input-group pt-3">
                        <label class="input-group-text" for="post" style="color=bold"><b>Write your post here!</b></label>
                        <textarea id="post" name="post" class="form-control"
                            style="resize: none" rows="3">{{ $post->post }}</textarea>
                </div>
                <div class="py-2"><button type="submit" class="btn btn-secondary">submit</button></div>
            </form>
        </div>
    </div>
@endsection
