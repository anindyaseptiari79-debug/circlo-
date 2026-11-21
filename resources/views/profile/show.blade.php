<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile · Circlo</title>
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

        .app { display: grid; grid-template-columns: 240px 1fr; min-height: 100vh; }

        /* Sidebar */
        .sidebar { position: sticky; top: 0; height: 100vh; padding: 28px 18px; background: var(--ink); color: var(--white); display: flex; flex-direction: column; }
        .logo { display: flex; align-items: center; gap: 10px; padding: 0 10px; font-size: 22px; font-weight: 700; }
        .logo-mark { width: 30px; height: 30px; border: 2px solid currentColor; border-radius: 50%; display: grid; place-items: center; font-size: 13px; }
        .nav { margin-top: 40px; display: grid; gap: 6px; }
        .nav a { padding: 12px 14px; border-radius: 12px; color: rgba(255, 254, 250, .72); font-weight: 500; }
        .me { margin-top: auto; display: flex; gap: 12px; align-items: center; padding: 12px; border-radius: 14px; background: var(--lime); color: var(--ink); }
        .me small { display: block; color: var(--muted); }
        .avatar { width: 40px; height: 40px; border-radius: 50%; background: var(--orange); color: var(--white); display: grid; place-items: center; font-weight: 700; }
        .logout { margin-top: 10px; width: 100%; padding: 10px; border: 1px solid rgba(255, 254, 250, .2); border-radius: 12px; background: none; color: var(--white); font: inherit; cursor: pointer; }

        /* Main */
        .main { padding: 36px 44px 48px; max-width: 980px; }
        .alert { margin-bottom: 20px; padding: 12px 16px; border-radius: 14px; background: var(--lime); }
        .head { display: flex; justify-content: space-between; align-items: center; }
        .head h1 { font-size: 32px; letter-spacing: -.02em; }
        .btn { padding: 12px 20px; border-radius: 999px; background: var(--ink); color: var(--white); font-weight: 600; }

        .card { margin-top: 24px; border: 1px solid var(--line); border-radius: 26px; background: var(--white); overflow: hidden; }
        .cover { height: 110px; background: var(--green); }
        .identity { display: flex; gap: 18px; align-items: flex-end; padding: 0 30px; margin-top: -44px; }
        .avatar-lg { width: 96px; height: 96px; border: 5px solid var(--white); border-radius: 50%; background: var(--orange); color: var(--white); display: grid; place-items: center; font-size: 32px; font-weight: 700; }
        .identity h2 { font-size: 26px; letter-spacing: -.02em; }
        .identity p { color: var(--muted); }
        .status { margin-left: auto; margin-bottom: 8px; padding: 6px 12px; border-radius: 999px; background: var(--lime); font-size: 13px; font-weight: 600; }

        .details { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; padding: 28px 30px 32px; }
        .detail { padding: 16px 18px; border: 1px solid var(--line); border-radius: 16px; }
        .detail.wide { grid-column: span 2; }
        .detail span { display: block; font-size: 12px; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; color: var(--muted); }
        .detail p { margin-top: 6px; font-size: 16px; }
        .empty { color: var(--muted); font-style: italic; }
    </style>
</head>

<body>
    <div class="app">
        <aside class="sidebar">
            <a href="{{ url('/') }}" class="logo"><span class="logo-mark">c</span> circlo</a>
            <nav class="nav">
                <a href="#">Home</a>
                <a href="#">Explore</a>
                <a href="#">My Transactions</a>
                <a href="#">My Items</a>
            </nav>

            <a href="{{ route('profile.show') }}" class="me">
                <span class="avatar">{{ strtoupper(substr($student->name, 0, 1)) }}</span>
                <span>{{ $student->name }} <small>ITS Student</small></span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout" type="submit">Log out</button>
            </form>
        </aside>

        <main class="main">
            @if (session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            <div class="head">
                <h1>My Profile</h1>
                <a href="#" class="btn">Edit Profile</a>
            </div>

            {{-- UI-03 Profile Page: data from the Student Account (users table) --}}
            <section class="card">
                <div class="cover"></div>
                <div class="identity">
                    <div class="avatar-lg">{{ strtoupper(substr($student->name, 0, 1)) }}</div>
                    <div>
                        <h2>{{ $student->name }}</h2>
                        <p>Member since {{ $student->created_at->format('d F Y') }}</p>
                    </div>
                    <span class="status">● {{ $student->account_status }}</span>
                </div>

                <div class="details">
                    <div class="detail">
                        <span>Student ID</span>
                        <p>{{ $student->student_id }}</p>
                    </div>
                    <div class="detail">
                        <span>Email</span>
                        <p>{{ $student->email }}</p>
                    </div>
                    <div class="detail">
                        <span>Phone number</span>
                        <p class="{{ $student->phone_number ? '' : 'empty' }}">{{ $student->phone_number ?? 'Not added yet' }}</p>
                    </div>
                    <div class="detail">
                        <span>Campus pickup point</span>
                        <p class="{{ $student->campus_pickup_point ? '' : 'empty' }}">{{ $student->campus_pickup_point ?? 'Not added yet' }}</p>
                    </div>
                    <div class="detail wide">
                        <span>About</span>
                        <p class="{{ $student->about ? '' : 'empty' }}">{{ $student->about ?? 'Tell other students a little about yourself.' }}</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
