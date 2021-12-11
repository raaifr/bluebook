@extends('layouts.app')

@section('content')
<div class="p-8">
    @if(isset($post))

    @if(Auth::user()->id == $post->user->id)
    <div class="flex flex-row-reverse">
        <a class="inline-flex items-center p-3 rounded-md text-base no-underline text-gray-100 bg-primary hover:bg-primary-light"
            href="{{Route('post.edit',['post'=>$post])}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            <span>Edit This Post</span>
        </a>
    </div>
    @endif

    <h1 class="text-4xl">{{$post->title}}</h1>

    <div class="mb-3">
        <div class="text-md leading-relaxed flex py-2">
            <img class="w-auto h-96 mt-4 mr-4 mb-4" src="{{asset('/storage/post_images/'.$post->image)}}">

            <div class="item-body px-2 m-4 mr-4 mb-4">
                {{$post->content}}
            </div>

        </div>
    </div>

    <div class="mb-3 border-t">
        <h1 class="text-4xl mb-6">Comments</h1>

        <form action="{{ Route('post.comment') }}" method="POST" class="mt-3 mb-6 flex">
            @csrf
            <input hidden name="postid" value="{{$post->id}}">
            <input id="comment" name="comment" type="text" placeholder="Comment on this post" autocomplete="false"
                class="w-full rounded-l-md border p-2 bg-gray-200 font-light">
            <input name="btnpostcomment" type="submit"
                class="cursor-pointer rounded-r-md border p-4 bg-secondary hover:bg-secondary-light border-secondary-dark border-t border-b border-r">
        </form>

        @foreach($post->comments as $comment)
        <div class="mt-3 mb-3 border rounded-lg bg-gray-200 px-4 py-3">
            <p class="font-bold mr-4 mb-2">{{$comment->user->name}}</p>
            <p>{{$comment->text}}</p>
        </div>
        @endforeach



    </div>

    @else
    <h1 class="text-4xl">Post Not Found</h1>
    @endif

</div>
@endsection