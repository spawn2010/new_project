<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Начальная страница</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark ">
    <div class="container-fluid">
        <a class="navbar-brand" >Logo</a>
    </div>
</nav>
<div class="container mt-4">
    <div class="col">
        <form method="post">
            <h1 style="text-align: center;">Авторизация</h1>
            <?php
            if (!empty($pageData['error'])) : ?>
                <p><?php
                    echo $pageData['error']; ?></p>
            <?php
            endif; ?>
            <input type="text" class="form-control" name="login"
                   id="login" placeholder="Введите логин"><br>
            <input type="password" class="form-control" name="pass"
                   id="pass" placeholder="Введите пароль"><br>
            <button class="btn btn-success" type="submit" name="check" value="1">Авторизоваться</button>
            <button class="btn btn-success" type="submit" name="add" value="1">Зарегестрироваться</button>
        </form>
    </div>
</div>
</body>
</html>
