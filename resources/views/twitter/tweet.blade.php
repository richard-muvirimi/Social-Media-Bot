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

        <h2 class="my-5">Post a tweet</h2>

        <div class=" bg-light border rounded-3">
            <div class="m-5">
                <form method="GET" action="{{ url('/tweet') }}">

                    <div class="form-group">
                        <label for="tweet" class="m-3"> Tweet status update</label>
                        <textarea class="form-control m-3" col="50" row="20" name="tweet" id="tweet"
                            placeholder="Status to Tweet">{{ $last }}</textarea>
                    </div>
                    <button class="btn btn-primary m-3" type="submit">Tweet</button>
                    <button class="btn btn-primary m-3" type="reset">Reset</button>
                </form>
            </div>

            @if ($tweet->errors ?? false)
                <div class="alert alert-danger">
                    <strong>Errors!</strong>
                    @foreach ($tweet->errors as $error)
                        {{ $error->message }}
                    @endforeach
                </div>
            @else
                @if ($status ?? '')
                    <div class="alert alert-success">
                        <strong>Success!</strong>
                        {{ $status }}
                    </div>
                @endif

                <div class="m-3">
                    @if ($tweet ?? '')
                        <div>
                            {{ view('twitter.item', compact('tweet')) }}
                        </div>
                    @else
                        <div>
                            <p>Tweets posted above will show here.</p>
                        </div>
                    @endif
                </div>
            @endif

        </div>

        <div class="my-5">
            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Made by webentangled
            </div>
        </div>
    </div>
</body>

</html>
