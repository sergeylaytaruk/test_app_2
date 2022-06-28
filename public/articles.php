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
                        <form action="controller.php" method="post">
                            <input type="hidden" name="action" value="add_article" />
                            <div class="column">
                                <div class="row">
                                    <label for="">Название</label>
                                </div>
                                <div class="row">
                                    <input type="text" name="title" />
                                </div>
                                <div class="row">
                                    <label for="">Текст</label>
                                </div>
                                <div class="row">
                                    <textarea name="text" rows="10" style="width: 400px;height: 200px;"></textarea>
                                </div>
                                <div class="row">
                                    <input type="submit" value="Сохранить" />
                                </div>
                            </div>
                        </form>
                        <?php
                    }

                    $articles = (new Articles())->getAllItems();
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
