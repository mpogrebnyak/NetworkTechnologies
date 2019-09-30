<?php
include_once __DIR__.'/../RouteManager/RouteManager.php';

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

    public static function GetAllPost($domainId) {
        $route = RouteManager::GetAllPostsOnDomainRoute($domainId);
        $ch = curl_init($route);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $posts = curl_exec($ch);
        curl_close($ch);
        return $posts;
    }

    public static function CreatePost($domainId) {
        $route = RouteManager::CreatePostOnDomainRoute($domainId);

        $postData = array (
            "title" => "Заголовок",
            "content" => "контент",
            "author" => "автор",
            "excerpt" => "информация",
            "status" => "publish",
            "postParent" => 0,
            "url" => "test/post",
            "thumbnailUrl" => "",
            "postType" => "Тип"
        );
        $postJSON = json_encode($postData);

        $ch = curl_init($route);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJSON);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $post = curl_exec($ch);

        print_r($post);
        curl_close($ch);
        return 1;
    }

    public static function DeletePost($domainId, $postId) {

        $route = RouteManager::DeletePostOnDomainRoute($domainId, $postId);

        $ch = curl_init($route);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_exec($ch);
        curl_close($ch);

    }
}