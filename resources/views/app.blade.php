<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
    <script src="https://unpkg.com/centrifuge@5.0.0/dist/centrifuge.js"></script>
    <style rel="/css/base.css"></style>
    <script>
        const telegram = window.Telegram.WebApp
        telegram.expand()
        telegram.onEvent('viewportChanged', () => telegram.expand())
    </script>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
