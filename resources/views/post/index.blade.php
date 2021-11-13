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


    <div>
        @if($posts->count())
            @foreach($posts as $post)
                <div class="row p-4">
                    <div class="col">
                        <div class="row">

                            <div class="col-10" style="padding-left: 0">
                                Name:<a href="{{ route('post.show',$post->id) }}"> {{$post->user->name}}</a><span class="px-2">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            @if(auth()->user())

                            @if($post->ownedBy(auth()->user()))
                            <div class="col-1 p-0 m-0">
                                <a class="btn btn-warning" href={{ route('post.edit',$post->id) }} role="button">edit</a>
                            </div>
                            <div class="col-1 p-0 m-0">
                                <a type="button" class="btn btn-danger" href="#" data-bs-toggle="modal"
                                    data-bs-target="#ModalDelete{{ $post->id }}">Delete</a>
                                @include('post.modals.delete')
                            </div>
                            @endif
                            @endif
                        </div>
                        <div class="row">
                            @if(strlen($post->post)>100)
                            <p> {{Str::words($post->post, 6,'')}}
                                <a href="{{ route('post.show',$post->id) }}">...read all</a>
                                @else
                                Post: {{ $post->post }}
                                @endif
                            </p>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        @else
        <div class="row">
            <div class="col m-5">
                <p class="m-4 text-center">There are no posts</p>
            </div>
        </div>
        @endif
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection