<!DOCTYPE html>
<html>
<head>
    <title>Omniarate</title>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta name="description" content="Omniarate - Web application" />
    <meta name="keywords" content="javascript, dynamic, grid, layout, jquery plugin, fit zone"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/freewall.js"></script>
    <script type="text/javascript" src="../js/jquery.raty.js"></script>
</head>
<body>
<div class="container">
    <header>
        <h1 id="logo">
            <a href="#"><img src="img/logo.png" height="30" alt="Omniarate - logo" /></a>
        </h1>
        <nav>
            <ul>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Top</a></li>
                <li><a href="#">Gallery</a></li>
                <a href="../auth/logout"><li class="login"Logout</li></a>
            </ul>
        </nav>
    </header>
@yield('content')

</body>
</html>








