<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <div class="form-container">
    <form action="{{ route ('loginForm')}}" method="POST">
        @csrf
            @if (session('alerts'))
                @foreach (session('alerts') as $type => $message)
                <div class="alert alert-{{ $type }}">
                {{ $message }}
                </div>
                @endforeach
            @endif

        <label for="email">Email </label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button>Submit</button>

    </form>
    </div>
</body>
</html>