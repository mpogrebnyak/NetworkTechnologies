<?php
include_once __DIR__.'/../RouteManager/RouteManager.php';
include_once __DIR__.'/../../Models/PostModel.php';

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

    public static function GetPost($domainId, $postId) {
        $route = RouteManager::GetPostOnDomainRoute($domainId, $postId);
        $ch = curl_init($route);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $post = curl_exec($ch);
        curl_close($ch);
        return $post;
    }

    public static function CreatePost($domainId, PostModel $postModel) {
        $route = RouteManager::CreatePostOnDomainRoute($domainId);

        $postData = array (
            "title" => $postModel->title,
            "content" => $postModel->content,
            "author" => $postModel->author,
            "excerpt" => $postModel->excerpt,
            "status" => $postModel->status,
            "postParent" => 0,
            "url" => $postModel->url,
            "thumbnailUrl" => $postModel->thumbnailUrl,
            "postType" => $postModel->postType
        );

        $postJSON = json_encode($postData);

        $ch = curl_init($route);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJSON);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_exec($ch);

        //print_r($post);
        curl_close($ch);
        return 1;
    }

    public static function UpdatePost($domainId, $postId, PostModel $postModel) {
        $route = RouteManager::UpdatePostOnDomainRoute($domainId, $postId);

        $postData = array (
            "title" => $postModel->title,
            "content" => $postModel->content,
            "author" => $postModel->author,
            "excerpt" => $postModel->excerpt,
            "status" => $postModel->status,
            "postParent" => 0,
            "url" => $postModel->url,
            "thumbnailUrl" => $postModel->thumbnailUrl,
            "postType" => $postModel->postType
        );
		
		//TODO: доделать
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