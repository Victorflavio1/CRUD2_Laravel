<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #4CAF50;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-around;
        }
        nav ul li {
            margin: 0 10px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: rgb(17, 71, 9)
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/cadastro') }}">Cadastro</a></li>
            <li><a href="{{ url('/listar') }}">Listar</a></li>
            <li><a href="{{ url('/sobre-nos') }}">Sobre Nós</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
