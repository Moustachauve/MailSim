<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MailSim</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="glyphicon glyphicon-envelope"></span>
                MailSim
            </a>
        </div>

    </div>
</nav>

<div class="container">
    @yield('content')

    <footer class="footer">
        <p>© Christophe Gagnier.</p>
    </footer>
</div>

<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

</body>
</html>