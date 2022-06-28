<?php
session_start();
use components\Articles;

require __DIR__ . '/../vendor/autoload.php';
include 'display_errors.php';
?>

<html>
<?php
include 'header.php';
?>

<body id="body">
<div class="header-block">
    Статьи
    <?php include 'menu.php'; ?>
</div>
<div class="main-block">
    <div class="column center" style="min-width: 500px;">
        <div class="row">
            <?php
            if (!empty($_SESSION['id_user'])) {
                ?>
                <form action="search.php" method="post">
                    <div class="column">
                        <div class="row">
                            <input type="text" name="search" />
                        </div>
                        <div class="row">
                            <input type="submit" value="Поиск" />
                        </div>
                    </div>
                </form>
                <?php
            }
            if (!empty($_POST['search'])) {
                $articles = (new Articles())->search($_POST['search']);
            } else {
                $articles = (new Articles())->getAllItems();
            }
            if (!empty($articles['data'])) {
                echo '<div class="column" style="width: 100%;">';
                foreach ($articles['data'] as $item) {
                    echo '<div class="row">';
                    echo "<h3>{$item['title']}</h3>";
                    echo '</div>';
                    echo '<div class="row">';
                    echo "<p>{$item['text']}</p>";
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
</body>

</html>
