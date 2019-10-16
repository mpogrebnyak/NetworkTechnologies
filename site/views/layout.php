<div id="layout">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="styles/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Network Technologies</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-button" href="#createPostModal">Add Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-button" href="views/addDemoPost.php">Add Demo Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-button" href="#">Delete All Post</a>
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
                <a href="'.$post["url"].'">
                <div class="post-title">'.$post["title"].'</div>
                </a>
                <div class="post-content" style="background-image: url('.$post["thumbnailUrl"].')">'.$post["content"].'</div>
                <a href="#updatePostModal?'.$post["id"].'" class="btn btn-primary update-btn">Update</a>
                </div>
                            
            <form name="update" action="views/updatePost.php" method="post">
					<a href="#x" class="overlay" id="updatePostModal?'.$post["id"].'"></a>
					<div class="popup">
					  <h2 class="modal-title">Update post</h2>
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
					  <h2 class="modal-title">Add post</h2>
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
					<input type="text" id="url" name="url" placeholder="Url" class="form-control disabled" required autofocus>
					
					<label for="thumbnailUrl" class="sr-only">ThumbnailUrl</label>
					<input type="thumbnailUrl" id="thumbnailUrl" name="thumbnailUrl" placeholder="ThumbnailUrl" class="form-control disabled" required autofocus>
					
					<button class="btn btn-primary btn-custom" href="views/addPost.php" name="submit" type="submit">Add</button>
					</div></form>';
        ?>
    </div>
</div>
