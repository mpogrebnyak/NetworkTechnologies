<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.10.2019
 * Time: 21:40
 */

class PostModel {
    public $title;
    public $content;
    public $author;
    public $excerpt;
    public $status;
    public $postParent;
    public $url;
    public $thumbnailUrl;
    public $postType;

    public function __construct(
        $title,
        $content,
        $author,
        $excerpt,
        $postParent,
        $url,
        $thumbnailUrl) {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->excerpt = $excerpt;
        $this->postParent = (int)$postParent;
        $this->url = $url;
        $this->thumbnailUrl = $thumbnailUrl;

        $this->status = "publish";
        $this->postType = "Type";
    }
}