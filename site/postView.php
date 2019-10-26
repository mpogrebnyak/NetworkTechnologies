<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Network Technologies</title>

    <link href="bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/layout.css" rel="stylesheet" type="text/css">
    <link href="styles/modal.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap-4.3.1/js/bootstrap.min.js"></script>

</head>
<body class="body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">
        <img src="styles/img/logo.png" width="30" height="30" class="d-inline-block align-top">
        Network Technologies</a>
</nav>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once __DIR__ .'/Managers/RequestManager/RequestManager.php';
include_once __DIR__ .'/Helpers/SiteHelper.php';

$domainId = SiteHelper::GetDomainId("cm93089_group5");
$post = RequestManager::GetPost($domainId, $_GET['id']);
$post = (array)json_decode($post);


echo '
<div class="post-view">
    <h1 class="view-title">'.$post["title"].'</h1>
    <div class="view-row">
        <div class="view-image"><img src="'.$post["thumbnailUrl"].'" width="100%"></div>
        <div class="view-content">'.$post["content"].'</div>
    </div>
    <div class="view-author">Author: '.$post["author"].'</div>
</div>';
?>

</body>
</html>
