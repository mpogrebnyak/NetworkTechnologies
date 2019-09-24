<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/layout.css" rel="stylesheet" type="text/css">
    <title>Network Technologies</title>
</head>
<body class="body">
<nav class="navbar navbar-expand-lg fixed-top ">
    <a class="navbar-brand">Network Technologies</a>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-4">

            <li class="nav-item">
                <a class="nav-button" href="#">Add Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-button" href="#">Delete Post</a>
            </li>
        </ul>

    </div>
</nav>
<div class="container">
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once __DIR__.'/RequestManager/RequestManager.php';
    $domains = RequestManager::GetAllDomains();
    print_r($domains);
    ?>
</div>
</body>
</html>