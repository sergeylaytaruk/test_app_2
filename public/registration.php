<html>
<?php
include 'header.php';
?>

<body id="body">
<div class="header-block">
    Регистрация
    <?php include 'menu.php'; ?>
</div>
<div class="main-block center">
    <div class="column center">
    <form action="controller.php" method="post">
        <input type="hidden" name="action" value="registration" />
        <div class="row">
            <label for="">Логин</label>
            <input type="text" name="login" />
        </div>
        <div class="row">
            <label for="">Пароль</label>
            <input type="password" name="password" />
        </div>
        <div class="row">
            <input type="submit" value="Зарегистрировать" />
        </div>
    </form>
    </div>
</div>
</body>

</html>
