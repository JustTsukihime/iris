<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/is.styles.css') }}">
    <script>
        var config = {
            "url": "{{ route('screen.slides', ['id' => $screen->url]) }}"
        }
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scripts-is.js') }}"></script>
    <title>Informatīvais ekrāns</title>
</head>
<body>
<div id="content"></div>
</body>
</html>