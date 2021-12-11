@extends('layouts.app')

@section('content')
<div class="p-8">

    @if(isset($updated))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">Post Updated</p>
        <p class="text-sm">Changes to your post has been updated and saved.</p>
    </div>
    @endif

    @if(isset($deleted))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">Post Created</p>
        <p class="text-sm">Your post has been Removed
        </p>
    </div>
    @endif

    <h1 class="font-bold text-gray-200 text-4xl mb-6 bg-blue-900 p-12 rounded-lg">My Posts</h1>

    @if(isset($posts))
    @foreach($posts as $post)



    <div class=" w-full lg:max-w-full flex mb-6">
        <image
            class="h-48 lg:h-auto lg:w-48 flex-none object-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
            src="{{asset('/storage/post_images/'.$post->image)}}" />

        <div
            class="flex flex-col  border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 justify-between leading-normal">

            <div class="mb-8">
                <div class="text-gray-900 font-bold text-xl mb-2">{{$post->title}}</div>
                <p class="text-gray-700 text-base">
                    {{Str::limit($post->content, 500, $end=' . . . ')}}
                    <a href="{{Route('post.show', ['id' => $post->id])}}" style="margin-right:15px"
                        class="underline text-secondary hover:text-secondary-light"> Read More </a>
                </p>
            </div>

            <div class="flex flex-col">
                <div class="flex flex-row">

                    <div class="flex items-center rounded bg-yellow-400 px-2 pb-2 mr-4">
                        <div class="">
                            <div class="w-4 h-4 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                        </div>
                        <a href="{{Route('post.edit', ['post' => $post])}}"
                            class="mt-2 ml-3 text-white shadow-border bg-blue hover:bg-blue-dark text-sm uppercase font-semibold">
                            Edit This Post
                        </a>
                    </div>

                    <div class="flex items-center rounded bg-red-700 px-2 pb-2">
                        <div class="">
                            <div class="w-4 h-4 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </div>
                        </div>
                        <a href="{{Route('post.delete', ['post' => $post])}}"
                            class="mt-2 ml-3 text-white shadow-border bg-blue hover:bg-blue-dark text-sm uppercase font-semibold">
                            Delete This Post
                        </a>
                    </div>


                </div>

                <div class="flex flex-row mt-6">
                    <p class="text-xs text-gray-600">Last updated {{$post->updated_at}}</p>
                </div>
            </div>


        </div>
    </div>

    @endforeach
    @endif

</div>
@endsection