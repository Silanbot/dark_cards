<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico">

    <title>darkcards</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <script src="/js/telegram-web-app.js"></script>
    <script src="https://unpkg.com/centrifuge@5.0.0/dist/centrifuge.js"></script>
    <link rel="stylesheet" href="/css/base.css">
    <script>
        const telegram = window.Telegram.WebApp
        telegram.expand()
        telegram.enableClosingConfirmation()
        telegram.headerColor = '#150808'
    </script>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
