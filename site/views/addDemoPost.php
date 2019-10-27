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
    (
        "Самые красивые места в мире",
        "Наша планета поистине уникальна. В каждом уголке мира можно найти великое множество достопримечательностей. Хотя бы одно из таких чудес света каждый человек мечтает увидеть воочию. И каждое место, которое можно с уверенностью назвать самым красивым местом в мире, заслуживает отдельного внимания. Вот только некоторые из них.",
        "Яндекс.Дзен",
        "Наша планета поистине уникальна. В каждом уголке мира можно найти великое множество достопримечательностей.",
        0,
        "https://uznayvse.ru/interesting-facts/samyie-krasivyie-mesta-v-mire.html",
        "https://s1.1zoom.ru/b5050/214/384698-alexfas01_1920x1200.jpg");

$domainId = SiteHelper::GetDomainId("cm93089_group5");

RequestManager::CreatePost($domainId, $postModel);
?>

</body>
</html>