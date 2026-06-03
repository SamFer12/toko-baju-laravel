<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            border-top: 7px solid #2b2f36;
            background: #edf4ff;
            color: #000;
            font-family: Arial, Helvetica, sans-serif;
        }

        .login-page {
            min-height: calc(100vh - 7px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 38px 18px;
        }

        .login-card {
            width: min(560px, 100%);
            min-height: 575px;
            padding: 30px 30px 31px;
            border: 1px solid #dedede;
            border-radius: 16px;
            background: #fff;
        }

        .login-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #205cff;
        }

        .login-icon svg {
            width: 45px;
            height: 45px;
        }

        h1 {
            margin: 0 0 12px;
            font-size: 30px;
            line-height: 1.2;
            text-align: center;
            font-weight: 700;
        }

        .subtitle {
            margin: 0 0 31px;
            color: #68718f;
            font-size: 20px;
            line-height: 1.4;
            text-align: center;
        }

        .form-group {
            margin-bottom: 17px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 16px;
            font-weight: 700;
        }

        input {
            width: 100%;
            height: 45px;
            padding: 0 16px;
            border: 0;
            border-radius: 9px;
            outline: 0;
            background: #f1f1f3;
            color: #111827;
            font-size: 16px;
        }

        input::placeholder {
            color: #68718f;
            opacity: 1;
        }

        input:focus {
            box-shadow: 0 0 0 2px rgba(32, 92, 255, .18);
        }

        .login-button {
            width: 100%;
            height: 45px;
            margin-top: 2px;
            border: 0;
            border-radius: 9px;
            background: #020013;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            font-weight: 700;
        }

        .login-button:hover {
            background: #080521;
        }

        .demo {
            margin: 44px 0 0;
            color: #5f6988;
            font-size: 16px;
            line-height: 1.4;
            text-align: center;
        }

        .demo strong {
            font-weight: 700;
        }

        .error-message {
            margin: -15px 0 18px;
            color: #dc2626;
            font-size: 14px;
            text-align: center;
        }

        @media (max-width: 640px) {
            .login-page {
                align-items: flex-start;
                padding-top: 42px;
            }

            .login-card {
                min-height: auto;
                padding: 28px 24px 30px;
            }

            h1 {
                font-size: 26px;
            }

            .subtitle {
                font-size: 17px;
            }
        }
    </style>
</head>

<body>
    <main class="login-page">
        <section class="login-card" aria-label="Login Admin">
            <div class="login-icon" aria-hidden="true">
                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 11h4.8l3.2 20.2h20.1l4-16.2H17" stroke="#fff" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21 39a2.9 2.9 0 1 0 0-5.8 2.9 2.9 0 0 0 0 5.8ZM36 39a2.9 2.9 0 1 0 0-5.8 2.9 2.9 0 0 0 0 5.8Z" fill="#fff" />
                </svg>
            </div>

            <h1>Sistem Manajemen Stok</h1>
            <p class="subtitle">Masukkan username dan password untuk melanjutkan</p>

            @if ($errors->has('login'))
                <p class="error-message">{{ $errors->first('login') }}</p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" placeholder="Masukkan username" value="{{ old('username') }}" autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Masukkan password">
                </div>

                <button class="login-button" type="submit">Login</button>
            </form>

            <p class="demo">Demo: username: <strong>admin</strong>, password: <strong>admin</strong></p>
        </section>
    </main>
</body>

</html>
