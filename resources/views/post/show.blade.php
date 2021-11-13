@extends('layouts.app')

@push('style')
<style type="text/css">
    .my-active span {
        background-color: #5cb85c !important;
        color: white !important;
        border-color: #5cb85c !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush

@section('content')
<div class='container'>

    <div class="row p-4">
        <div class="col">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('storage/images/'.$post->image) }}" width="100" height="100">
                    <div class="col-12">
                        <div class="btn-group">
                            <button class="btn btn-link m-0 p-1" type="submit"  data-bs-toggle="modal"
                            data-bs-target="#ModalEditImage">Edit</button>
                            @include('post.modals.updateImage')
                            <form method="post" action="">
                                @csrf
                                @method('delete')
                                <button class="btn btn-link m-0 p-1 text-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-10 mx-0">
                    <div class="mt-2" style="padding-left: 0">
                        Name: {{$post->user->name}} <span class="px-2">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @if(auth()->user())
                @if($post->ownedBy(auth()->user()))
                <div class="col-1 p-0 m-0">
                    <a class="btn btn-warning" href={{ route('post.edit',$post->id) }} role="button">Edit</a>
                </div>
                <div class="col-1 p-0 m-0">
                    <a type="button" class="btn btn-danger" href="#" data-bs-toggle="modal"
                        data-bs-target="#ModalDelete{{ $post->id }}">Delete</a>
                    @include('post.modals.delete')
                </div>
            </div>
            @endif
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                Post: {{$post->post}}
            </div>
        </div>
        <ul class="px-0 w-100">
            @foreach($post->comments as $comment)
            <li class="list-group-item border-2 my-3">
                {{-- error by trying to get the user --}}
                {{-- <div class="col-12">by {{$post->$comment->user->name }}
    </div> --}}
    {{-- @if($post->comment->ownedBy(auth()->user())) --}}
    {{-- <strong>{{ $comment->created_at->diffForHumans() }}: &nbsp</strong> --}}
    <div class="col-12">{{$comment->comment}}</div>
    @auth
    <div class="col-12">
        <div class="btn-group">
            <button class="btn m-0 p-1 btn-link" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $comment->id }}">Edit</button>
            @include('post.modals.comment')
            <form method="post" action="{{ route('comment.delete',$comment->id) }}">
                @csrf
                @method('delete')
                <button class="btn m-0 p-1 btn-link text-danger" style="background: none;" type="submit">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @endauth
    {{-- @endif --}}
    </li>
    @endforeach
    </ul>
    <hr>
    <div class="card mt-3 w-75">
        <h5 class="card-header">Add Comment</h5>
        <div class="card-body">
            <form method="post" action="{{ route('comment.add',$post->id) }}">
                @csrf
                <div class="form-group">
                    <textarea name="comment" placeholder="Your comment here" class="form-control" style="resize: none"
                        cols="5" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn mt-2 btn-primary">Add comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>
@endsection