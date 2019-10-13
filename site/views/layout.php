<div id="layout">
    <nav class="navbar navbar-expand-lg fixed-top ">
        <a class="navbar-brand">Network Technologies</a>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-4">

                <li class="nav-item">
                    <a class="nav-button" href="#createPostModal">Add Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-button" href="#">Delete Post</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include_once __DIR__.'/../'.'Managers/RequestManager/RequestManager.php';
        include_once __DIR__.'/../'.'Helpers/SiteHelper.php';

        $domainId = SiteHelper::GetDomainId("cm93089_group5");

        //$domains = RequestManager::GetAllDomains();
        //print_r($domains);

        //RequestManager::DeletePost($domainId,27);
        //$posts = RequestManager::GetAllPost($domainId);
        //$posts = json_decode($posts)->{'result'};
        //print_r($posts->{'data'});
        ?>

        <div class="wrapper">
        <?php
        $posts = RequestManager::GetAllPost($domainId);
        $posts = json_decode($posts)->{'result'};
        foreach($posts->{'data'} as $value) {
            $post = (array)$value;
            echo '<div class="post">
                <a class="delete" title="Delete" href="views/deletePost.php?id='.$post["id"].'"></a>
                <div class="post-title">'.$post["title"].'</div>
                <div class="post-content" style="background-image: url('.$post["thumbnailUrl"].')">'.$post["content"].'</div>
                <a href="#updatePostModal?'.$post["id"].'" class="btn btn-primary update-btn">Update</a>
                </div>
                            
            <form name="update" action="views/updatePost.php" method="post">
					<a href="#x" class="overlay" id="updatePostModal?'.$post["id"].'"></a>
					<div class="popup">
					  <h2>Update post</h2>
					<a class="close"title="Close" href="#close"></a>
					
					
					<input type="text" name="id" value="'.$post["id"].'" hidden>
					<label for="title">Title</label>
					<input type="text" id="title" name="title" placeholder="Title" value="'.$post["title"].'" class="form-control" required autofocus>
					
					<label for="content">Content</label>
					<input type="text" id="content" name="content" placeholder="Content" value="'.$post["content"].'" class="form-control" required autofocus>
					
					<label for="author">Author</label>
					<input type="text" id="author" name="author" placeholder="Author" value="'.$post["author"].'" class="form-control">
					
					<label for="excerpt">Excerpt</label>
					<input type="text" id="excerpt" name="excerpt" placeholder="Excerpt" value="'.$post["excerpt"].'" class="form-control" required autofocus>
					
					<button class="btn btn-primary btn-custom" href="views/updatePost.php" name="submit" type="submit">Update</button>
					</div></form>';
        }
        //$post = RequestManager::CreatePost($domainId);
        //print_r($post);
        ?>
        </div>

        <?php
        echo '<form name="insert" action="views/addPost.php" method="post">
					<a href="#x" class="overlay" id="createPostModal"></a>
					<div class="popup">
					  <h2>Add post</h2>
					<a class="close"title="Close" href="#close"></a>
					
					<label for="title" class="sr-only">Title</label>
					<input type="text" id="title" name="title" placeholder="Title" class="form-control" required autofocus>
					
					<label for="content" class="sr-only">Content</label>
					<input type="text" id="content" name="content" placeholder="Content" class="form-control" required autofocus>
					
					<label for="author" class="sr-only">Author</label>
					<input type="text" id="author" name="author" placeholder="Author" class="form-control">
					
					<label for="excerpt" class="sr-only">Excerpt</label>
					<input type="text" id="excerpt" name="excerpt" placeholder="Excerpt" class="form-control" required autofocus>
										
					<label for="url" class="sr-only">Url</label>
					<input disabled="disabled" type="text" id="url" name="url" placeholder="Url" class="form-control disabled" required autofocus>
					
					<label for="thumbnailUrl" class="sr-only">ThumbnailUrl</label>
					<input disabled="disabled" type="thumbnailUrl" id="thumbnailUrl" name="thumbnailUrl" placeholder="ThumbnailUrl" class="form-control disabled" required autofocus>
					
					<button class="btn btn-primary btn-custom" href="views/addPost.php" name="submit" type="submit">Add</button>
					</div></form>';
        ?>
    </div>
</div>
