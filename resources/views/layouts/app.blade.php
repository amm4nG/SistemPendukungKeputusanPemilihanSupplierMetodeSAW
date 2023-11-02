<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- bootstrap icon' --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bacasime+Antique&family=Bona+Nova:ital@1&family=Caveat:wght@400;700&family=Josefin+Sans:wght@200&family=Montserrat:wght@300&family=Nanum+Myeongjo&family=Playfair+Display:ital@1&family=Roboto+Mono:wght@100;300&family=Roboto+Slab:wght@500&family=Tektur:wght@500&family=Victor+Mono:wght@500&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@500&display=swap" rel="stylesheet">
    <style>
        .body-1 {
            min-height: 100vh;
            /* background: rgb(2, 0, 36);
            background: radial-gradient(circle, rgba(2, 0, 36, 1) 0%, rgba(9, 68, 121, 0.9780287114845938) 0%, rgba(0, 212, 255, 1) 100%); */
            background: rgb(252, 70, 107);
            background: radial-gradient(circle, rgba(252, 70, 107, 0.8099614845938375) 1%, rgba(63, 94, 251, 1) 99%);
        }

        .bg-1 {
            background: rgb(117, 198, 215);
            background: radial-gradient(circle, rgba(117, 198, 215, 0.4234068627450981) 0%, rgba(173, 185, 196, 0.3757878151260504) 78%,
                    rgba(173, 185, 196, 0.3757878151260504) 100%);
        }

        .form-control::placeholder {
            color: white;
            /* Ganti dengan warna yang Anda inginkan */
        }

        .form-control {
            border: none;
            /* Menghilangkan semua border */
            border-bottom: 1px solid #ccc;
            /* Menambahkan border bagian bawah */
            /* transition: border-color 0.2s; */
        }

        .form-control:focus {
            border-color: #ccc;
            /* Ubah warna border bagian bawah */
            outline: none;
            /* Menghilangkan outline pada focus */
            box-shadow: none;
            /* Menghilangkan box shadow saat focus */
        }
    </style>
</head>

<body class="@yield('body')">
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @yield('scripts')
</body>

</html>
