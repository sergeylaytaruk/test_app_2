<?php
session_start();
?>
<html>
<?php
include 'header.php';
?>

<body id="body">
    <div class="header-block">
        Вход
        <?php include 'menu.php'; ?>
    </div>
    <div class="main-block">
        <div class="column center">
        <form action="controller.php" method="post">
            <input type="hidden" name="action" value="login" />

            <div class="row">
                <label for="">Логин</label>
                <input type="text" name="login" />
            </div>
            <div class="row">
                <label for="">Пароль</label>
                <input type="password" name="password" />
            </div>
            <div class="row">
                <input type="submit" value="Войти" />
            </div>
        </form>
        </div>
    </div>
</body>

</html>
