<?php
include_once 'RoutesList.php';

class RouteManager {
    public static function GetAllDomainsRoute() {
        return RoutesList::$allDomainsRoute;
    }
}
