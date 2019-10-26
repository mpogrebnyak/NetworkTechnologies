<html>
<head>
    <meta content="0.1,../index.html" http-equiv="refresh">
</head>
<body>
<?php

include_once __DIR__.'/../'.'Managers/RequestManager/RequestManager.php';
include_once __DIR__.'/../'.'Helpers/SiteHelper.php';

$domainId = SiteHelper::GetDomainId($_POST["name"]);
if ($domainId == null) {
    RequestManager::CreateDomain($_POST["name"]);
}
?>

</body>
</html>