<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="logo">
                <img src="/images/logo.png" alt="">
                <h1>Tarefas</h1>
            </div>
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required autocomplete="current-password">
                </div>

                <div>
                    <button type="submit" class="button_primary">Entrar</button>
                    <a href="{{ route('register') }}">Ou Criar conta</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>