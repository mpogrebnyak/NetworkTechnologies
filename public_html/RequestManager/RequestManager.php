<?php
include_once '/../'.'/RouteManager/RouteManager.php';

class RequestManager
{
    public static function GetAllDomains() {
        $route = RouteManager::GetAllDomainsRoute();
        // инициализация
        $ch = curl_init($route);
        // устанавливаем параметры
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // получаем результат
        $domains = curl_exec($ch);
        // закрываем соединение
        curl_close($ch);
        return $domains;
    }
}