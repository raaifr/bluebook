@extends('layouts.app')

@section('content')
<div class="p-8">


    @if (session('status'))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">Session Status</p>
        <p class="text-sm"> {{ session('status') }}</p>
    </div>

    @endif

    @if(isset($updated))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">Post Updated</p>
        <p class="text-sm">Changes to your post has been updated and saved.</p>
    </div>
    @endif

    @if(isset($postid))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">Post Created</p>
        <p class="text-sm">Your post has been created. Anyone can now view your post with this
            <a class="font-bold underline:none hover:text-primary-dark hover:underline"
                href="{{Route('post.show', ['id' => $postid])}}">link</a>
        </p>
    </div>
    @endif

    @if(isset($posts))
    @foreach($posts as $post)



    <div class="w-full lg:max-w-full lg:flex mb-6">
        <image
            class="h-48 lg:h-auto lg:w-48 flex-none object-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
            src="{{asset('/storage/post_images/'.$post->image)}}" />

        <div
            class="justify-between border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col">

            <div class="mb-3">
                <div class="text-gray-900 font-bold text-xl mb-2">{{$post->title}}</div>
                <p class="text-gray-700 text-base">
                    {{Str::limit($post->content, 500, $end=' . . . ')}}
                    <a href="{{Route('post.show', ['id' => $post->id])}}" style="margin-right:15px"
                        class="underline text-secondary hover:text-secondary-light"> Read More </a>
                </p>
            </div>

            <div class="flex flex-row items-center mb-6">
                <a href="{{Route('post.like', ['id' => $post->id])}}" class="flex group">
                    <p class="text mr-3 text-gray-900 leading-none">
                        {{$post->likes}}
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="cursor-pointer group-hover:text-primary-light fill-current text-gray-500 w-6 h-6 mr-6"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                </a>

                <a href="{{Route('post.show', ['id' => $post->id])}}" class="cursor-pointer flex group">
                    <p class="text mr-3 text-gray-900 leading-none">{{count($post->comments)}} </p>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="cursor-pointer group-hover:text-primary-light fill-current text-gray-500 w-6 h-6 mr-2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </a>
            </div>

            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-500 w-6 h-6 mr-2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <div class="">
                    <p class="text-sm text-gray-900 leading-none">{{$post->user->name}}</p>
                    <p class="text-xs text-gray-600">Last updated {{$post->updated_at}}</p>
                </div>
            </div>


        </div>




    </div>

    @endforeach
    @endif

</div>
@endsection