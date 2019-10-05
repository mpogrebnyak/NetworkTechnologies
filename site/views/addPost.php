<html>
<head>
    <meta content="0.1,../index.html" http-equiv="refresh">
</head>
<body>
<?php

include_once __DIR__.'/../'.'Managers/RequestManager/RequestManager.php';
include_once __DIR__.'/../'.'Helpers/SiteHelper.php';

$postModel =
    SiteHelper::MapPostModel
        ($_POST["title"], $_POST["content"], $_POST["author"], $_POST["excerpt"], 0,"test/post","test/post");

$domainId = SiteHelper::GetDomainId("cm93089_group5");

RequestManager::CreatePost($domainId, $postModel);
?>

</body>
</html>