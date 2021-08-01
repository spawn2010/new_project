<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Таблица</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/rating/rating.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<form action="problem/addProblem" method="post" class="container mt-4">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Проблема</th>
            <th scope="col">Решение</th>
            <th scope="col">Оценка</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <input type="text" class="form-control-s " placeholder="Опишите проблему" name="problem">
            </td>
            <td>
                <input type="text" class="form-control-s " placeholder="Опишите решение" name="decision">
            </td>
            <td>
                <div class="rating-result">
                </div>
            </td>
        </tr>
        <?php
        foreach ($pageData['problem'] as $key => $value) { ?>
            <tr>
                <td><?php echo $value['problem']; ?></td>
                <td><?php echo $value['decision']; ?> </td>
                <td>
                    <div class="rating-result"><?php $i = 1;
                        while ($i <= $value['rating']) {
                            echo '<span class="active"></span>';
                            $i++;
                        } ?> </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <button class="btn btn-success" type="submit">Добавить</button>
</form>
<form class="container mt-4" action="user/logout" method="post">
    <button class="btn btn-success" type="submit" name="exit">Выйти</button>
</form>
</body>
</html>

