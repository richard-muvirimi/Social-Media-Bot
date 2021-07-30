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
    <div class="container my-3">

        <h2 class="my-5">Search Tweets</h2>

        <div class=" bg-light border rounded-3">
            <div class="m-5">
                <form method="GET" action="{{ url('/search') }}">

                    <div class="form-group">
                        <label for="search" class="m-3">Retreive tweets with:</label>
                        <input class="form-control m-3" name="search" id="search" value="{{ $search }}"
                            placeholder="Text to search" required>
                        <small>Retreive tweets</small>
                    </div>
                    <button class="btn btn-primary m-3" type="submit">Retreive tweets</button>
                    <button class="btn btn-primary m-3" type="reset">Reset</button>
                </form>
            </div>

            @if ($tweets->errors ?? '')
                <div class="alert alert-danger">
                    <strong>Errors!</strong>
                    @foreach ($tweets->errors as $error)
                        {{ $error->message }}
                    @endforeach
                </div>
            @else
                <div class="m-3">
                    @if ($tweets ?? '')
                        <div>
                            @foreach ($tweets->statuses as $tweet)
                                {{ view('twitter.item', compact('tweet')) }}
                            @endforeach
                        </div>
                    @else
                        <div>
                            <p>Tweets matching search will show here.</p>
                        </div>
                    @endif
            @endif
        </div>
    </div>

    <div class="my-5">
        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Made by webentangled
        </div>
    </div>
    </div>
    </div>
</body>

</html>
