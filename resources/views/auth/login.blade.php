<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Digit ~ Opening Ceremony</title>

    <style>
        :root {
            --dark-bg: #131515;
            --light-bg: #F2F2F2;
            --accent: #9C14EC;
            --grey: #bdbdbd;
            --dark-text: #F2F2F2;
            --light-text: #131515;
            --transition-standard: 0.3s ease;
            --transition-smooth: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            --navbar-icon: #fff;
            --menu-bg: #111;
            --menu-text: #fff;
            --grey-dark: #bdbdbd;
            --grey-light: #666666;
            --scrollbar-track: #232323;
            --scrollbar-thumb: #9C14EC;
            --scrollbar-thumb-hover: #b84cff;
            --navbar-bg: rgba(19,21,21,0.92);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: var(--dark-bg);
            color: var(--dark-text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: var(--menu-bg);
            padding: 2rem;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            font-size: 1.8rem;
            color: var(--dark-text);
            margin-bottom: 0.5rem;
        }

        .login-logo {
            max-width: 150px;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--grey);
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--grey-light);
            border-radius: 4px;
            background-color: var(--dark-bg);
            color: var(--dark-text);
            transition: var(--transition-standard);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(156, 20, 236, 0.2);
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .remember-me input[type="checkbox"] {
            width: auto;
            margin-right: 0.5rem;
        }

        .remember-me label {
            color: var(--grey);
            font-size: 0.9rem;
        }

        .submit-button {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--accent);
            color: var(--dark-text);
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition-standard);
        }

        .submit-button:hover {
            background-color: var(--scrollbar-thumb-hover);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .session-status {
            background-color: rgba(156, 20, 236, 0.1);
            color: var(--accent);
            padding: 0.75rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <img src="{{ asset('logo.png') }}" alt="Digit Logo" class="login-logo">
            <h1>Welcome Back</h1>
            <p style="color: var(--grey)">Please sign in to continue</p>
        </div>

        @if (session('status'))
            <div class="session-status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                >
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-me">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    name="remember"
                >
                <label for="remember_me">Remember me</label>
            </div>

            <button type="submit" class="submit-button">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
