<?php
include_once __DIR__.'/../Managers/RequestManager/RequestManager.php';

class SiteHelper {
    public static function GetDomainId() {
        $domainsJSON = RequestManager::GetAllDomains();
        $domains = json_decode($domainsJSON);
        print_r($domains[1]);
        return 1;
    }
}