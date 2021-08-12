<!DOCTYPE html>
<meta charset="UTF-8">
<title>Оценка инцидентов</title>

<link rel="stylesheet" href="/css/rating/rating.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css">
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" >Logo</a>
            <form class="d-flex" action="user/logout" method="post">
                <a class="navbar-brand"><?php echo($_SESSION['auth']['login']);?></a>
                <button class="btn btn-success" type="submit" name="exit">Выйти</button>
            </form>
        </div>
    </nav>
</header>
<div class="container-fluid mt-5">
    <div class="col-12 col-md-6 p-2" >
        <h1>Список инцидентов</h1>
    </div>
    <form method="post" class="container mt-4">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Проблема</th>
                <th scope="col">Решение</th>
                <th scope="col">Оценка</th>
            </tr>
            </thead>
            <tbody>
            </tr>
            <?php
            $k = 1;
            foreach ($pageData['problem'] as $key => $value) { ?>
                <tr>
                    <td><?php
                        echo $value['problem']; ?></td>
                    <td><?php
                        echo $value['decision']; ?> </td>
                    <td>
                        <div class="rating-result">
                            <?php
                            $i = 1;
                            if ($value['rating'] != '')
                            {
                            while ($i <= $value['rating']) {
                                echo '<span class="active" ></span>';
                                $i++;
                            } ?></div><?php
                        } else { ?>
                            <form method="post">
                                <div class="rating-area">
                                    <?php
                                    for ($n = 5; $n != 0; $n--) {
                                        ?><input  formaction="problem/addRating" type="submit" id="star-.<?= $k ?>"
                                                  name="<?= $value ['id']; ?>"
                                                  value="<?= $n ?>">
                                    <label for="star-.<?= $k;
                                    $k++ ?>" title="Оценка «5»"></label><?php
                                    } ?>
                                </div>
                            </form>
                            <?php
                            ;
                        } ?> </td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
    </form>

</div>
<footer class="container mt-5">
    <div class="col-md-2 ">
        <p>© Не список инцидентов </p>
    </div>
</footer>
</body>
</html>