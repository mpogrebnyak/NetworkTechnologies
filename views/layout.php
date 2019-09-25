<div id="layout">
    <nav class="navbar navbar-expand-lg fixed-top ">
        <a class="navbar-brand">Network Technologies</a>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-4">

                <li class="nav-item">
                    <a class="nav-button" href="#">Add Post</a>
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
        $domains = RequestManager::GetAllDomains();
        print_r($domains);
        ?>
    </div>
</div>
