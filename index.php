<?php
require 'config.php';
require 'models/Auth.php';
require 'dao/PostDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

$postDao = new PostDaoMysql($pdo);
$feed = $postDao->getHomeFeed($userInfo->id);

require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="feed mt-10">
    <div class="row">

        <div class="column pr-5">

            <?php require 'partials/feed-editor.php'; ?>

            <?php foreach($feed as $item): ?>
                <?php require 'partials/feed-item.php'; ?>
            <?php endforeach; ?>

        </div>

        <div class="column side pl-5">

            <div class="box banners">
                <div class="box-header">
                    <div class="box-header-text">
                        Patrocinios
                    </div>
                    <div class="box-header-buttons">

                    </div>
                </div>
                    <div class="box-body">
                        <a href="https://www.nike.com.br/"><img src="<?=$base;?>/media/uploads/nk.jpg" /></a>
                        <a href="https://www.apple.com/"><img src="<?=$base;?>/media/uploads/apple.jpg" /></a>
                    </div>
            </div>

                <div class="box">
                    <div  class="box-body m-10">
                        <a href="https://github.com/CharlieCidral">Edit. By Charlie C.</a>
                    </div>
                </div>

        </div>
    </div>
</section>

<?php
require 'partials/footer.php';
?>