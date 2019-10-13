<html>
<head>
    <meta content="0.1,../index.html" http-equiv="refresh">
</head>
<body>
<?php

include_once __DIR__.'/../'.'Managers/RequestManager/RequestManager.php';
include_once __DIR__.'/../'.'Helpers/SiteHelper.php';

$domainId = SiteHelper::GetDomainId("cm93089_group5");

RequestManager::DeletePost($domainId, $_GET["id"]);
?>

</body>
</html>