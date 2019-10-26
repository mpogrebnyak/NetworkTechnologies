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
                <li hidden class="nav-item">
                    <a class="nav-button" href="#createDomain">Create domain</a>
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
        if($domainId == null) {
            echo '<div class="server-error">
                    <div style="margin-bottom: 20px">К сожалению, сервер недоступен. Наши сотрудники уже решают эту проблему.</div>
                    <img class= "error-img" src="styles/img/fixies.png" height="400">
                  </div>';
        }
        else {
            echo '<div class="wrapper">';
            $posts = RequestManager::GetAllPost($domainId);
            $posts = json_decode($posts)->{'result'};
            foreach($posts->{'data'} as $value) {
                $post = (array)$value;
                echo '<div class="post">
                <a class="delete" title="Delete" href="views/deletePost.php?id='.$post["id"].'"></a>
                <a class="link" href="'.$post["url"].'">
                <div class="post-title">'.$post["title"].'</div>
                </a>
                <div class="post-content" style="background-image: url('.$post["thumbnailUrl"].')">'.$post["content"].'</div>
                <a href="#updatePostModal?id='.$post["id"].'" class="btn btn-primary update-btn">Update</a>
                </div>
                            
            <form name="update" action="views/updatePost.php" method="post">
					<a href="#x" class="overlay" id="updatePostModal?id='.$post["id"].'"></a>
					<div class="popup">
					  <h2 class="modal-title">Update post</h2>
					<a class="close"title="Close" href="#close"></a>
					
					
					<input type="text" name="id" value="'.$post["id"].'" hidden>
					<label for="title" class="label">Title</label>
					<input type="text" id="title" name="title" placeholder="Title" value="'.$post["title"].'" class="form-control" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<label for="content" class="label">Content</label>
					<input type="text" id="content" name="content" placeholder="Content" value="'.$post["content"].'" class="form-control" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<label for="author" class="label">Author</label>
					<input type="text" id="author" name="author" placeholder="Author" value="'.$post["author"].'" class="form-control required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus">
					
					<label for="excerpt" class="label">Excerpt</label>
					<input type="text" id="excerpt" name="excerpt" placeholder="Excerpt" value="'.$post["excerpt"].'" class="form-control" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<label for="url" class="label">Url</label>
					<input type="text" id="url" name="url" placeholder="Url" value="'.$post["url"].'" class="form-control disabled" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<label for="thumbnailUrl" class="label">ThumbnailUrl</label>
					<input type="text" id="thumbnailUrl" name="thumbnailUrl" placeholder="ThumbnailUrl" value="'.$post["thumbnailUrl"].'" class="form-control disabled" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<button class="btn btn-primary btn-custom" href="views/updatePost.php" name="submit" type="submit">Update</button>
					</div></form>';
            }
            echo '</div>';
        }
        ?>

        <?php
        echo '<form name="insert" action="views/addPost.php" method="post">
					<a href="#x" class="overlay" id="createPostModal"></a>
					<div class="popup">
					  <h2 class="modal-title">Add post</h2>
					<a class="close"title="Close" href="#close"></a>
					
					<label for="title" class="label">Title</label>
					<input type="text" id="title" name="title" placeholder="Title" class="form-control" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<label for="content" class="label">Content</label>
					<input type="text" id="content" name="content" placeholder="Content" class="form-control" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<label for="author" class="label">Author</label>
					<input type="text" id="author" name="author" placeholder="Author" class="form-control" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<label for="excerpt" class="label">Excerpt</label>
					<input type="text" id="excerpt" name="excerpt" placeholder="Excerpt" class="form-control" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
										
					<label for="url" class="label">Url</label>
					<input type="text" id="url" name="url" placeholder="Url" class="form-control disabled" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<label for="thumbnailUrl" class="label">ThumbnailUrl</label>
					<input type="text" id="thumbnailUrl" name="thumbnailUrl" placeholder="ThumbnailUrl" class="form-control disabled" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<button class="btn btn-primary btn-custom" href="views/addPost.php" name="submit" type="submit">Add</button>
					</div></form>';
        ?>
        <?php
        echo '<form name="createDomain" action="views/createDomain.php" method="post">
					<a href="#x" class="overlay" id="createDomain"></a>
					<div class="popup">
					  <h2 class="modal-title">Create domain</h2>
					<a class="close"title="Close" href="#close"></a>
					
					<label for="name" class="label">Name</label>
					<input type="text" id="name" name="name" placeholder="Name" class="form-control" required oninvalid="this.setCustomValidity(\'Fixies cannot set empty fields. Please fill the field.!\')" oninput="setCustomValidity(\'\')" autofocus>
					
					<button class="btn btn-primary btn-custom" href="views/createDomain.php" name="submit" type="submit">Create</button>
					</div></form>';
        ?>

    </div>
</div>
