<?php
include 'auth.php';
include 'roles.php';

// Попытка входа
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (login($username, $password)) {
        $_SESSION['user_role'] = 'user'; // Здесь можно определить роль пользователя, например, на основе данных из базы данных
        header('Location: index.php');
        exit();
    } else {
        echo "Неверное имя пользователя или пароль";
    }
}

// Выход
if (isset($_POST['logout'])) {
    logout();
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пример авторизации на базе RBAC</title>
</head>
<body>

<?php if (is_logged_in()): ?>
    <p>Вы вошли как <?php echo $_SESSION['user']; ?></p>
    <?php if (has_permission('manage_content')): ?>
        <p>У вас есть доступ к управлению контентом.</p>
    <?php endif; ?>
    <?php if (has_permission('manage_users')): ?>
        <p>У вас есть доступ к управлению пользователями.</p>
    <?php endif; ?>
    <form method="post">
        <button type="submit" name="logout">Выйти</button>
    </form>
<?php else: ?>
    <form method="post">
        <input type="text" name="username" placeholder="Имя пользователя"><br>
        <input type="password" name="password" placeholder="Пароль"><br>
        <button type="submit" name="login">Войти</button>
    </form>
<?php endif; ?>

</body>
</html>
