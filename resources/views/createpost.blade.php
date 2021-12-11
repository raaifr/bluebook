@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center">
    <div class="px-4 py-12 sm:px-4 md:px-12 lg:px-20 xl:px-20 2xl:px-20 w-full">

        <form method="POST" action="{{ Route('post.save') }}" enctype="multipart/form-data">

            <h1 class="text-center font-bold tracking-wider text-3xl mb-8 w-full text-gray-600">
                Create a Post
            </h1>
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-primary text-md font-bold mb-2 sm:mb-4">
                    Post Title
                </label>

                <input id="title" name="title" type="text" placeholder="Give your post a Title"
                    class="form-input @error('title') border-red-500 @enderror w-5/12 ounded-md appearance-none border p-4 font-light leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('title') }}" required autofocus>

                @error('title')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-primary text-md font-bold mb-2 sm:mb-4">
                    Post Content
                </label>

                <textarea id="content" name="content" type="text" placeholder="Whats on your mind?"
                    class="form-input  @error('content') border-red-500 @enderror resize-y w-full h-40 rounded-md appearance-none border p-4 font-light leading-tight focus:outline-none focus:shadow-outline"
                    required autofocus>{{ old('content') }}</textarea>

                @error('title')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <label for="" class="block text-primary text-md font-bold mb-2 sm:mb-4">
                Post Image
            </label>

            <div class="flex items-center mb-4">


                <image name="imgpreview" id="imgpreview" class="h-52 w-72 mr-12 bg-gray-200 object-scale-down overflow-hidden"
                    src="#"></image>

                <label class="
                        w-64
                        flex flex-col
                        items-center
                        px-4
                        py-6
                        bg-white
                        rounded-md
                        shadow-md
                        tracking-wide
                        uppercase
                        border border-blue
                        cursor-pointer
                        hover:bg-secondary hover:text-white
                        text-secondary
                        ease-linear
                        transition-all
                        duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-primary h-14 w-14" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Select an image file</span>
                    <input type="file" name="postimage" id="postimage" class="hidden" onchange="readURL(this);"/>
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </label>


            </div>

            <div class="flex items-center justify-end">

                <input href="{{ route('home')}}" value="Cancel"
                    class="w-1/6 text-center mr-3 select-none whitespace-no-wrap p-3 rounded-md text-base no-underline text-gray-600 bg-gray-300 hover:bg-gray-200 sm:py-4 transition-all duration-300"
                    />

                <input type="submit" value="Create"
                    class="w-1/4 text-center ml-3 select-none whitespace-no-wrap p-3 rounded-md text-base no-underline text-gray-100 bg-primary hover:bg-primary-light sm:py-4 transition-all duration-300"
                    />

            </div>

        </form>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgpreview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


@endsection