<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Quotes</title>

    <style>
        .quote-background {
            position: relative;
            height: 100vh;
            width: 100%;
            background-position: center center;
            background-size: cover;

        }


        .quote-background .quote-text {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            transform: translateY(-50%);
            color: white;
            font-size: 2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            text-align: center;
            padding: 10px 20px;
            box-sizing: border-box;
            backdrop-filter: blur(5px);
        }
    </style>
</head>

<body>

    @php
        $backgroundImage = $bg_image ? 'url(' . asset(Storage::url($bg_image->image)) . ')' : 'none';
        $brec_quote = $quote->quote ?? 'No quote available';
    @endphp

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-5">
                <div class="quote-background" style="background-image: {{ $backgroundImage }}">
                    <div class="quote-text">
                        {{ $brec_quote }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
