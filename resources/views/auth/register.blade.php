<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/register.css">
    <title>Register</title>
</head>

<body>
    <main>
        <div class="container">

            <h2>Cadastrar conta</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name"
                        autofocus>
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        autocomplete="email">
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required autocomplete="new-password">
                </div>

                <button type="submit" class="button_primary">Cadastrar</button>
            </form>

        </div>
    </main>
</body>

</html>