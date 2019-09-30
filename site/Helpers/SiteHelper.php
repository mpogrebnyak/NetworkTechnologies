<?php
include_once __DIR__.'/../Managers/RequestManager/RequestManager.php';

class SiteHelper {
    public static function GetDomainId($domainName) {
        $domainsJSON = RequestManager::GetAllDomains();
        $domains = json_decode($domainsJSON,true);

        for ($i = 0; $i < count($domains); $i++) {
            $domain = (object)$domains[$i];

            if ($domain->domainName == $domainName){
                return $domain->id;
            }
        }
        return null;
    }
}