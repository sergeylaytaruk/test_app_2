<?php

use components\Articles;
session_start();
require __DIR__ . '/../vendor/autoload.php';
include 'display_errors.php';
?>
<html>
<?php
include 'header.php';
?>

<body id="body">
    <div class="header-block">
        <?php include 'menu.php'; ?>
    </div>
    <div class="main-block">
        <?php
            echo '<div class="column center">';
            $articles = (new Articles())->getLastItems();
            if (!empty($articles['data'])) {
                foreach ($articles['data'] as $item) {
                    echo '<div class="row">';
                    echo "<a href='articles.php'>{$item['title']}</a>";
                    echo '</div>';
                }
            }
            echo '</div>';
        ?>
    </div>
</body>

</html>

