<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f5f4ed">
    <title>Log in · Circlo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|instrument-serif:400i" rel="stylesheet">
    <style>
        :root {
            --ink: #203b32;
            --muted: #64736a;
            --paper: #f5f4ed;
            --white: #fffefa;
            --green: #2f604d;
            --lime: #d7ed9f;
            --orange: #e98b5e;
            --line: #e2e0d5;
        }

        * { box-sizing: border-box; margin: 0; }

        body {
            min-height: 100vh;
            font-family: 'Instrument Sans', system-ui, sans-serif;
            color: var(--ink);
            background: var(--paper);
            display: grid;
            place-items: center;
            padding: 32px 20px;
        }

        .shell {
            width: 100%;
            max-width: 1040px;
            display: grid;
            grid-template-columns: 1.05fr 1fr;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 30px 60px -40px rgba(32, 59, 50, .35);
        }

        /* Left: brand panel */
        .brand {
            position: relative;
            padding: 48px;
            background: var(--green);
            color: var(--white);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 48px;
            overflow: hidden;
        }

        .brand::after {
            content: "";
            position: absolute;
            width: 420px; height: 420px;
            right: -170px; bottom: -170px;
            border: 70px solid rgba(215, 237, 159, .14);
            border-radius: 50%;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 22px;
            letter-spacing: -.02em;
            color: inherit;
            text-decoration: none;
        }

        .logo-mark {
            width: 30px; height: 30px;
            border: 2px solid currentColor;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 13px;
        }

        .eyebrow {
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--lime);
        }

        .eyebrow::before { content: "● "; color: var(--orange); }

        .brand h1 {
            margin-top: 18px;
            font-size: clamp(38px, 4.4vw, 54px);
            line-height: 1;
            letter-spacing: -.035em;
        }

        .brand h1 em {
            font-family: 'Instrument Serif', Georgia, serif;
            font-weight: 400;
            color: var(--lime);
        }

        .brand p {
            margin-top: 18px;
            max-width: 340px;
            line-height: 1.6;
            color: rgba(255, 254, 250, .78);
        }

        .chips { display: flex; flex-wrap: wrap; gap: 8px; position: relative; z-index: 1; }

        .chip {
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 254, 250, .1);
            border: 1px solid rgba(255, 254, 250, .18);
            font-size: 13px;
        }

        /* Right: auth card */
        .auth { padding: 48px; }

        .tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding: 5px;
            background: var(--paper);
            border-radius: 999px;
            margin-bottom: 32px;
        }

        .tab {
            border: 0;
            padding: 11px;
            border-radius: 999px;
            background: transparent;
            font: inherit;
            font-weight: 600;
            color: var(--muted);
            cursor: pointer;
        }

        .tab.is-active {
            background: var(--white);
            color: var(--ink);
            box-shadow: 0 2px 8px rgba(32, 59, 50, .12);
        }

        .auth h2 { font-size: 28px; letter-spacing: -.02em; }
        .auth .sub { margin: 6px 0 26px; color: var(--muted); }

        form { display: none; }
        form.is-active { display: block; }

        .field { margin-bottom: 16px; }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 600;
        }

        .field input {
            width: 100%;
            padding: 13px 16px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: var(--white);
            font: inherit;
            color: var(--ink);
        }

        .field input:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 4px rgba(47, 96, 77, .12);
        }

        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

        .meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 4px 0 24px;
            font-size: 14px;
            color: var(--muted);
        }

        .meta label { display: flex; align-items: center; gap: 8px; }
        .meta a { color: var(--green); font-weight: 600; text-decoration: none; }

        .btn {
            width: 100%;
            padding: 14px;
            border: 0;
            border-radius: 999px;
            background: var(--ink);
            color: var(--white);
            font: inherit;
            font-weight: 600;
            cursor: pointer;
        }

        .btn:hover { background: var(--green); }

        .switch { margin-top: 22px; text-align: center; font-size: 14px; color: var(--muted); }

        .switch button {
            border: 0;
            background: none;
            font: inherit;
            font-weight: 600;
            color: var(--green);
            cursor: pointer;
        }


        .alert { margin-bottom: 20px; padding: 12px 16px; border-radius: 14px; font-size: 14px; }
        .alert-success { background: var(--lime); color: var(--ink); }
        .error { margin-top: 6px; font-size: 13px; color: #c2410c; }
        .field input.is-invalid { border-color: #e98b5e; background: #fff7f2; }
        @media (max-width: 820px) {
            .shell { grid-template-columns: 1fr; }
            .brand, .auth { padding: 32px 26px; }
        }
    </style>
</head>


<body>
    <main class="shell">
        <section class="brand">
            <a href="{{ url('/') }}" class="logo"><span class="logo-mark">c</span> circlo</a>

            <div>
                <span class="eyebrow">Your campus, sharing</span>
                <h1>Borrow. Share.<br><em>Make it count.</em></h1>
                <p>Access books, gadgets, sports gear, and more from your fellow students — without buying new.</p>
            </div>

            <div class="chips">
                <span class="chip">📚 Books</span>
                <span class="chip">💻 Electronics</span>
                <span class="chip">⛺ Sports &amp; outdoor</span>
            </div>
        </section>

        <section class="auth">
            <div class="tabs">
                <button class="tab" data-tab="login" type="button">Login</button>
                <button class="tab" data-tab="register" type="button">Register</button>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Use case: Login --}}
            <form id="login" method="POST" action="{{ route('login.attempt') }}">
                @csrf
                <input type="hidden" name="form" value="login">
                <h2>Welcome back</h2>
                <p class="sub">Log in to keep sharing with your circle.</p>

                <div class="field">
                    <label for="identifier">Email or Student ID</label>
                    <input id="identifier" name="identifier" value="{{ old('identifier') }}"
                        class="@error('identifier') is-invalid @enderror" placeholder="student@its.ac.id">
                    @error('identifier') <p class="error">{{ $message }}</p> @enderror
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="••••••••">
                </div>

                <div class="meta">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>

                <button class="btn" type="submit">Login</button>
                <p class="switch">Don't have an account? <button type="button" data-tab="register">Register</button></p>
            </form>

            {{-- Use case: Register (insert form) --}}
            <form id="register" method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="form" value="register">
                <h2>Create your account</h2>
                <p class="sub">Join Circlo with your student identity.</p>

                <div class="field">
                    <label for="name">Full name</label>
                    <input id="name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
                    @error('name') <p class="error">{{ $message }}</p> @enderror
                </div>
                <div class="row">
                    <div class="field">
                        <label for="student_id">Student ID</label>
                        <input id="student_id" name="student_id" value="{{ old('student_id') }}"
                            class="@error('student_id') is-invalid @enderror" placeholder="5026241010">
                        @error('student_id') <p class="error">{{ $message }}</p> @enderror
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            class="@error('email') is-invalid @enderror">
                        @error('email') <p class="error">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <label for="reg_password">Password</label>
                        <input id="reg_password" name="password" type="password"
                            class="@error('password') is-invalid @enderror">
                    </div>
                    <div class="field">
                        <label for="password_confirmation">Confirm password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password">
                    </div>
                </div>
                @error('password') <p class="error" style="margin:-6px 0 14px">{{ $message }}</p> @enderror

                <button class="btn" type="submit">Create Account</button>
                <p class="switch">Already have an account? <button type="button" data-tab="login">Login</button></p>
            </form>
        </section>
    </main>

    <script>
        const show = (name) => {
            document.querySelectorAll('.tab').forEach(t => t.classList.toggle('is-active', t.dataset.tab === name));
            document.querySelectorAll('form').forEach(f => f.classList.toggle('is-active', f.id === name));
        };
        document.querySelectorAll('[data-tab]').forEach(b => b.addEventListener('click', () => show(b.dataset.tab)));
        show(@json($tab === 'register' ? 'register' : 'login'));
    </script>
</body>

</html>
