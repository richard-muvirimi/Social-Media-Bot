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
    <div class="">

        <div class="container">
            <div class="">
                <div class="m-5">
                    <form method="GET" action="{{ url("/tweet") }}">

                        @if ( old("status") )
                        <div class="alert alert-success">
                            <strong>Success!</strong>{{old("status")}}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="tweet" class="m-3">Status</label>
                            <textarea class="form-control m-3" col="50" row="20" name="tweet" id="tweet"
                                placeholder="Status to Tweet"></textarea>
                        </div>
                        <button class="btn btn-primary m-3" type="submit">Tweet</button>
                    </form>
                </div>
            </div>

            <div class="">
                <div class="m-5">
                    <form method="GET" action="{{ url("/list") }}">

                        @if ( old("status") )
                        <div class="alert alert-success">
                            <strong>Success!</strong> {{old("status") }}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="tag" class="m-3">Retreive tweets by:</label>
                            <input class="form-control m-3" name="tag" id="tag" placeholder="Text to search">
                            <small>Retreive tweets</small>
                        </div>
                        <button class="btn btn-primary m-3" type="submit">Retreive tweets</button>
                    </form>
                </div>
            </div>

            <div class="">
                <div class="m-5">
                    <form method="GET" action="{{ url("/retweet") }}">

                        @if ( old("status") )
                        <div class="alert alert-success">
                            <strong>Success!</strong> {{old("status") }}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="tag" class="m-3">Filter statuses by:</label>
                            <input class="form-control m-3" name="tag" id="tag" placeholder="Text to search">
                            <small>For now will retweet only the first tweet, so that you can easily unretweet</small>
                        </div>
                        <button class="btn btn-primary m-3" type="submit">Retweet</button>
                    </form>
                </div>
            </div>

            <div class="">
                <div class="m-5">
                    <form method="GET" action="{{ url("/heart") }}">

                        @if ( old("status") )
                        <div class="alert alert-success">
                            <strong>Success!</strong> {{old("status") }}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="tag" class="m-3">Filter statuses by:</label>
                            <input class="form-control m-3" name="tag" id="tag" placeholder="Text to search">
                            <small>For now will favourate only the first tweet, so that you can easily
                                unfavourate</small>
                        </div>
                        <button class="btn btn-primary m-3" type="submit">Favourate</button>
                    </form>
                </div>
            </div>

            <div class="">



                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Made by webentangled
                </div>
            </div>
        </div>
    </div>
</body>

</html>