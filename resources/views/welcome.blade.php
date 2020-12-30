<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <h3>
        Users
    </h3>

    <div class="user_uploads">
        @php $user = \App\Models\User::find(2); @endphp
        @php $allImages = $user->getMedia('avatars')->all(); @endphp
        @php // dd($allImages); @endphp
        @php $imgA = $allImages[4]->getUrl() @endphp
        @php $imgx = $allImages[4]->getUrl('thumb') @endphp

        {{ $imgx }}

        Big
        <img src="{{ $imgA }}" alt="">

        Small
        <img src="{{ $imgx }}" alt="">

        {{-- Выводится сразу в <img/>--}}
        {{ $user->getMedia('avatars')->first() }}

        <form action="{{route('users') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="file" name="file"/>

            <button type="submit">
                Upload
            </button>
        </form>
    </div>

    <br>
    <br>

    <h3>Posts</h3>

    <div class="post_uploads">
        <form action="{{route('posts') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="file" name="file"/>

            <button type="submit">
                Upload
            </button>
        </form>
    </div>
</div>
</body>
</html>
