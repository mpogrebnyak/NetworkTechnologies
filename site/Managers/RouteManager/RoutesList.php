<?php
class RoutesList {
    public static $allDomainsRoute = "http://vulture-tm.ru:3000/domains";
    public static $allPostsOnDomainRoute = "http://vulture-tm.ru:3000/domains/{id}/post/all";
    public static $getPostOnDomainRoute = "http://vulture-tm.ru:3000/domains/{id}/post/{postId}";
    public static $createPostOnDomainRoute =  "http://vulture-tm.ru:3000/domains/{id}/post";
    public static $updatePostOnDomainRoute = "http://vulture-tm.ru:3000/domains/{id}/post/{postId}/update";
    public static $deletePostOnDomainRoute = "http://vulture-tm.ru:3000/domains/{id}/post/{postId}/delete";
}
