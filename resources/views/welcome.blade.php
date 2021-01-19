<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login to AAB</title>

    <style>
        html,
        body {
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <script async src="https://telegram.org/js/telegram-widget.js?14" data-telegram-login="ActualAnaliticBot" data-size="large" data-radius="10" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
    <script type="text/javascript">
        function onTelegramAuth(user) {
            alert('Logged in as ' + user.first_name + ' ' + user.last_name + ' (' + user.id + (user.username ? ', @' + user.username : '') + ')');
        }
    </script>
</body>
</html>
