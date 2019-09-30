<?php
include_once 'RoutesList.php';

class RouteManager {
    public static function GetAllDomainsRoute() {
        $route = RoutesList::$allDomainsRoute;
        return self::CreateRoute($route);
    }

    public static function GetAllPostsOnDomainRoute($domainId) {
        $route = RoutesList::$allPostsOnDomainRoute;
        return self::CreateRoute($route, $domainId);
    }

    public static function CreatePostOnDomainRoute($domainId) {
        $route = RoutesList::$createPostOnDomainRoute;
        return self::CreateRoute($route, $domainId);
    }

    private static function CreateRoute($route, $id = null, $postId = null) {
        return str_replace(['{id}', '{postId}'], [$id, $postId], $route);
    }
}
