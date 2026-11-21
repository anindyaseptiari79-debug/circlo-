<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f5f4ed">
    <title>Landing Circlo — Borrow. Share. Make it count.</title>
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

        body { font-family: 'Instrument Sans', system-ui, sans-serif; color: var(--ink); background: var(--paper); }
        a { color: inherit; text-decoration: none; }
        em { font-family: 'Instrument Serif', Georgia, serif; font-weight: 400; }

        .wrap { max-width: 1120px; margin: 0 auto; padding: 0 32px; }

        /* Navbar */
        .nav { display: flex; align-items: center; justify-content: space-between; padding: 26px 0; }
        .logo { display: flex; align-items: center; gap: 10px; font-size: 22px; font-weight: 700; letter-spacing: -.02em; }
        .logo-mark { width: 30px; height: 30px; border: 2px solid currentColor; border-radius: 50%; display: grid; place-items: center; font-size: 13px; }
        .links { display: flex; align-items: center; gap: 28px; font-weight: 500; }

        .btn { display: inline-block; padding: 13px 22px; border-radius: 999px; font-weight: 600; }
        .btn-dark { background: var(--ink); color: var(--white); }
        .btn-light { border: 1px solid var(--line); background: var(--white); }
        .btn-lime { background: var(--lime); color: var(--ink); }

        /* Hero */
        .hero { display: grid; grid-template-columns: 1.1fr 1fr; gap: 48px; align-items: center; padding: 48px 0 72px; }

        .eyebrow { font-size: 12px; font-weight: 600; letter-spacing: .14em; text-transform: uppercase; color: var(--green); }
        .eyebrow::before { content: "● "; color: var(--orange); }

        .hero h1 { margin: 18px 0; font-size: 62px; line-height: .98; letter-spacing: -.04em; }
        .hero h1 em { color: var(--green); }
        .hero p { max-width: 440px; font-size: 17px; line-height: 1.6; color: var(--muted); }
        .actions { display: flex; gap: 12px; margin-top: 30px; }

        .card {
            padding: 28px;
            border: 1px solid var(--line);
            border-radius: 28px;
            background: var(--white);
            box-shadow: 0 30px 60px -40px rgba(32, 59, 50, .4);
        }

        .card h3 { font-size: 20px; }
        .card .sub { margin: 4px 0 20px; color: var(--muted); font-size: 14px; }

        .field { margin-bottom: 12px; padding: 12px 16px; border: 1px solid var(--line); border-radius: 14px; color: var(--muted); font-size: 14px; }
        .field b { display: block; margin-bottom: 2px; color: var(--ink); font-size: 12px; }
        .card .btn { width: 100%; margin-top: 6px; text-align: center; }

        /* Sections */
        section.block { padding: 72px 0; }
        .block h2 { font-size: 40px; line-height: 1.05; letter-spacing: -.03em; }
        .block h2 em { color: var(--green); }
        .block .lead { margin-top: 12px; max-width: 520px; color: var(--muted); line-height: 1.6; }

        .grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-top: 36px; }

        .tile { padding: 26px; border: 1px solid var(--line); border-radius: 24px; background: var(--white); }
        .tile .icon { width: 48px; height: 48px; border-radius: 14px; display: grid; place-items: center; font-size: 22px; background: var(--paper); }
        .tile h4 { margin: 18px 0 6px; font-size: 18px; }
        .tile p { color: var(--muted); line-height: 1.55; font-size: 15px; }

        .steps { background: var(--green); color: var(--white); border-radius: 32px; padding: 56px; }
        .steps h2 em { color: var(--lime); }
        .steps .lead { color: rgba(255, 254, 250, .75); }
        .steps .tile { background: rgba(255, 254, 250, .07); border-color: rgba(255, 254, 250, .16); }
        .steps .tile p { color: rgba(255, 254, 250, .72); }
        .num { font-family: 'Instrument Serif', Georgia, serif; font-style: italic; font-size: 44px; color: var(--lime); line-height: 1; }

        .cta { text-align: center; padding: 88px 0 96px; }
        .cta h2 { font-size: 44px; letter-spacing: -.03em; }
        .cta h2 em { color: var(--green); }
        .cta .actions { justify-content: center; }

        footer { border-top: 1px solid var(--line); padding: 26px 0; color: var(--muted); font-size: 14px; }

        @media (max-width: 860px) {
            .hero, .grid { grid-template-columns: 1fr; }
            .hero h1 { font-size: 44px; }
            .links a:not(.btn) { display: none; }
            .steps { padding: 32px 24px; }
        }
    </style>
</head>

<body>
    <div class="wrap">
        <nav class="nav">
            <a href="{{ url('/') }}" class="logo"><span class="logo-mark">c</span> circlo</a>
            <div class="links">
                <a href="#how">How to join</a>
                <a href="{{ url('/login') }}">Log in</a>
                <a href="{{ route('landing') }}" class="btn btn-dark">Join Circlo ↗</a>
            </div>
        </nav>

        <header class="hero">
            <div>
                <span class="eyebrow">For ITS students</span>
                <h1>Your student ID is your <em>key to the circle.</em></h1>
                <p>
                    Circlo is a campus sharing platform where students lend, borrow, and rent
                    books, gadgets, and gear from each other. One free account is all you need to start.
                </p>
                <div class="actions">
                    <a href="{{ url('/login?tab=register') }}" class="btn btn-dark">Create your account ↗</a>
                    <a href="#how" class="btn btn-light">See how to join</a>
                </div>
            </div>

            <div class="card">
                <h3>Create your account</h3>
                <p class="sub">It takes less than a minute.</p>
                <div class="field"><b>Full name</b>Alya Putri</div>
                <div class="field"><b>Student ID</b>5026241010</div>
                <div class="field"><b>Campus email</b>alya@student.its.ac.id</div>
                <a href="{{ url('/login?tab=register') }}" class="btn btn-lime">Create Account</a>
            </div>
        </header>
    </div>

    <section class="block">
        <div class="wrap">
            <h2>What you can do <em>with Circlo</em></h2>
            <p class="lead">Everything happens between students of the same campus, so items stay close and easy to pick up.</p>
            <div class="grid">
                @foreach ($features as $feature)
                    <article class="tile">
                        <div class="icon">{{ $feature['icon'] }}</div>
                        <h4>{{ $feature['title'] }}</h4>
                        <p>{{ $feature['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="block" id="how">
        <div class="wrap">
            <div class="steps">
                <h2>Join in <em>three steps</em></h2>
                <p class="lead">Your account and profile are what other students see before they share with you.</p>
                <div class="grid">
                    @foreach ($steps as $i => $step)
                        <article class="tile">
                            <span class="num">0{{ $i + 1 }}</span>
                            <h4>{{ $step['title'] }}</h4>
                            <p>{{ $step['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="wrap cta">
        <h2>Ready to <em>join the circle?</em></h2>
        <div class="actions">
            <a href="{{ url('/login?tab=register') }}" class="btn btn-dark">Create your account ↗</a>
            <a href="{{ url('/login') }}" class="btn btn-light">I already have one</a>
        </div>
    </div>

    <footer>
        <div class="wrap">© {{ date('Y') }} Circlo · A circular sharing platform for student resources</div>
    </footer>
</body>

</html>
