<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">
    <div class="container my-5">

        <h2 class="my-5">Twitter Bot demonstration</h2>

        <div class="row">
            <div class="my-3 col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Status Update</h2>
                    <p>Post a new Tweet.</p>
                    <a href="{{ url('/tweet') }}" class="btn btn-outline-secondary" type="button">Tweet</a>
                </div>
            </div>

            <div class="my-3 col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Random Tweet</h2>
                    <p>Post a random Tweet.</p>
                    <a href="{{ url('/random') }}" class="btn btn-outline-secondary" type="button">Tweet</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="my-3 col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Comment</h2>
                    <p>Comment on a status based on it's content or hashtag.</p>
                    <a href="{{ url('/comment') }}" class="btn btn-outline-secondary" type="button">Comment</a>
                </div>
            </div>

            <div class="my-3 col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Search Tweets</h2>
                    <p>Search for tweets based on text, or hashtags.</p>
                    <a href="{{ url('/search') }}" class="btn btn-outline-secondary" type="button">Search</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="my-3 col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Retweet</h2>
                    <p>Retweet a status based on it's content or hashtag.</p>
                    <a href="{{ url('/retweet') }}" class="btn btn-outline-secondary" type="button">Retweet</a>
                </div>
            </div>

            <div class="my-3 col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Favourite</h2>
                    <p>Favourite a tweet based on it's content or hashtag.</p>
                    <a href="{{ url('/favourite') }}" class="btn btn-outline-secondary" type="button">Favourite</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="my-3 col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Delete Tweet</h2>
                    <p>Delete a status based on it's content or hashtag.</p>
                    <a href="{{ url('/delete') }}" class="btn btn-outline-secondary" type="button">Delete</a>
                </div>
            </div>
        </div>

        <div class="my-5">
            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Made by webentangled
            </div>
        </div>
    </div>
</body>

</html>
