<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= lang('Errors.pageNotFound') ?></title>

    <style>
        div.logo {
            height: 200px;
            width: 155px;
            display: inline-block;
            opacity: 0.08;
            position: absolute;
            top: 2rem;
            left: 50%;
            margin-left: -73px;
        }

        body {
            height: 100%;
            background: #fafafa;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #777;
            font-weight: 300;
            overflow: hidden;
            /* Add this to prevent scroll bars */
        }

        h1 {
            font-weight: lighter;
            letter-spacing: normal;
            font-size: 3rem;
            margin-top: 0;
            margin-bottom: 0;
            color: #222;
        }

        .wrap {
            max-width: 1024px;
            margin: 5rem auto;
            padding: 2rem;
            background: #fff;
            text-align: center;
            border: 1px solid #efefef;
            border-radius: 0.5rem;
            position: relative;
        }

        pre {
            white-space: normal;
            margin-top: 1.5rem;
        }

        code {
            background: #fafafa;
            border: 1px solid #efefef;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: block;
        }

        p {
            margin-top: 1.5rem;
        }

        .footer {
            margin-top: 2rem;
            border-top: 1px solid #efefef;
            padding: 1em 2em 0 2em;
            font-size: 85%;
            color: #999;
        }

        a:active,
        a:link,
        a:visited {
            color: #dd4814;
        }

        /* Animation styles */
        .emoji {
            position: absolute;
            top: -50px;
            font-size: 2rem;
            animation: fall linear infinite;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }
    </style>

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/library_fe/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/library_fe/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/library_fe/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/library_fe/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/library_fe/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/library_fe/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/library_fe/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <h1>404</h1>
                <h2>
                    <?php if (ENVIRONMENT !== 'production') : ?>
                        <?= nl2br(esc($message)) ?>
                    <?php else : ?>
                        <?= lang('Errors.sorryCannotFind') ?>
                    <?php endif; ?>
                </h2>
                <div class="py-5" style="font-size: 3rem;">&#128511;&#128540;&#128511;</div>
            </section>
        </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="/assets/library_fe/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/library_fe/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/library_fe/chart.js/chart.umd.js"></script>
    <script src="/assets/library_fe/echarts/echarts.min.js"></script>
    <script src="/assets/library_fe/quill/quill.min.js"></script>
    <script src="/assets/library_fe/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/library_fe/tinymce/tinymce.min.js"></script>
    <script src="/assets/library_fe/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    <!-- Custom JS for emoji rain -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const emojis = ['&#128511;', '&#128540;'];
            const createEmoji = () => {
                const emoji = document.createElement('div');
                emoji.innerHTML = emojis[Math.floor(Math.random() * emojis.length)];
                emoji.classList.add('emoji');
                emoji.style.left = Math.random() * 100 + 'vw';
                emoji.style.animationDuration = Math.random() * 2 + 3 + 's';
                document.body.appendChild(emoji);
                setTimeout(() => {
                    emoji.remove();
                }, 5000); // remove emoji after it falls
            }
            setInterval(createEmoji, 150); // create emoji every 300ms
        });
    </script>
</body>

</html>