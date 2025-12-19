<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Flores del Valle</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background: #fff8f0;
            font-family: "Poppins", sans-serif;
        }

        .navbar {
            background-color: #d63b65 !important;
            border-bottom: 4px solid #b2184c;
            box-shadow: 0 3px 6px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            font-size: 1.7rem;
            font-weight: bold;
            color: #fff !important;
            letter-spacing: 1px;
        }

        h1, h2, h3, h4, h5 {
            color: #b2184c;
            font-weight: bold;
        }

        footer {
            text-align: center;
            color: #8a8a8a;
            margin-top: 50px;
            font-size: 0.85rem;
        }


        ::-webkit-scrollbar-thumb {
            background-color: #b2184c;
        }
    </style>

</head>

<body>

<nav class="navbar navbar-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('pedidos.index') }}">
            Flores del Valle
        </a>
    </div>
</nav>

<div class="container mb-5">
    @yield('content')
</div>

<footer>
    © {{ date('Y') }} Flores del Valle
</footer>

</body>
</html>
