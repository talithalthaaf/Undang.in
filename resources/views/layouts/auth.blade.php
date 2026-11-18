
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Undang.in</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font utama Undang.in --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        //warna utama Undang.in

        :root {
            --savory-sage: #818263;
            --avocado-smoothie: #C2C395;
            --blush-beet: #DDBAAE;
            --peach-protein: #EFD7CF;
            --oat-latte: #DCD4C1;
            --honey-oatmilk: #F6EAD4;
            --coconut-cream: #FFFAF2;
        }

      //dasar halaman login dan register
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inknut Antiqua', serif;
            color: var(--savory-sage);
        }

        .auth-page {
            min-height: 100vh;
            background-color: var(--coconut-cream);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 90px 24px 40px;
            position: relative;
        }

        //tombol back to website
        .auth-back-link {
            position: absolute;
            top: 32px;
            right: 5%;

            color: var(--savory-sage);
            text-decoration: none;

            font-size: 14px;
            font-weight: 500;

            transition: color 0.2s ease;
        }

        .auth-back-link:hover {
            color: var(--blush-beet);
        }

       //card utama login dan register

        .auth-card {
            width: 100%;
            max-width: 687px;

            background-color: var(--peach-protein);
            border-radius: 20px;

            padding: 52px 66px;
        }
    
        //tulisan Undang.in di halaman login dan register
        .auth-logo {
            text-align: center;

            color: var(--savory-sage);
            font-size: 30px;
            font-weight: 700;

            margin: 0 0 4px;
        }

       //sub judul login dan register

        .auth-subtitle {
            text-align: center;

            color: var(--savory-sage);
            font-size: 15px;
            font-weight: 500;

            margin-bottom: 38px;
        }

       //area formulir
        .auth-content {
            width: 100%;
            max-width: 545px;
            margin: 0 auto;
        }

        //antarmuka yang responsif
        @media (max-width: 600px) {
            .auth-page {
                padding: 80px 16px 24px;
            }

            .auth-back-link {
                top: 24px;
                right: 20px;
                font-size: 12px;
            }

            .auth-card {
                padding: 36px 24px;
                border-radius: 16px;
            }

            .auth-logo {
                font-size: 24px;
            }

            .auth-subtitle {
                font-size: 12px;
                margin-bottom: 28px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-page">

        {{-- Link kembali ke halaman utama --}}
        <a href="{{ url('/') }}" class="auth-back-link">
            ← Back to Website
        </a>

        {{-- Card utama Login dan Register --}}
        <main class="auth-card">

            {{-- Logo website --}}
            <h1 class="auth-logo">
                Undang.in
            </h1>

            {{-- Subjudul sesuai halaman --}}
            <div class="auth-subtitle">
                @yield('subtitle')
            </div>

            {{-- Area isi formulir --}}
            <div class="auth-content">
                @yield('content')
            </div>

        </main>

    </div>

</body>
</html>
