        <?php if (empty($_SESSION['id_user'])) { ?>
        <a href="login.php" class="link-menu">Вход</a>
        <a href="registration.php" class="link-menu">Регистрация</a>
        <?php } ?>
        <?php if (!empty($_SESSION['id_user'])) { ?>
        <a href="controller.php?action=logout" class="link-menu">Выход</a>
        <?php } ?>
        <a href="search.php" class="link-menu">Поиск</a>
        <a href="articles.php" class="link-menu">Статьи</a>