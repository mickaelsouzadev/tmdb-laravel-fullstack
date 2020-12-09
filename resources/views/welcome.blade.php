<!DOCTYPE html>
<html>
<head> 
    <title>{{env('APP_NAME')}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.css"rel="stylesheet"/>
</head>
<body>
    <div id="app">
        <app></app>
    </div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>