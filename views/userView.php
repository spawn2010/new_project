<!DOCTYPE html>
<meta charset="UTF-8">
<title>Добавление инцидентов</title>

<link rel="stylesheet" href="/css/rating/rating.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
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
    <div class=" col-md-5" >
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Добавить инцидент
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавление инцидента</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="problem/addProblem" method="post">
                    <div class="modal-body">
                        <tr>
                            <td>
                                <input type="text" class="form-control"  placeholder="Опишите проблему" name="problem" aria-describedby="basic-addon1">
                                <hr>
                            </td>
                            <td>
                                <input type="text" class="form-control"  placeholder="Опишите решение" name="decision" aria-describedby="basic-addon1">
                            </td>
                            <td>
                                <div class="rating-result">
                                </div>
                            </td>
                        </tr>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        <?php
        foreach ($pageData['problem'] as $key => $value) { ?>
            <tr>
                <td><?php
                    echo $value['problem']; ?></td>
                <td><?php
                    echo $value['decision']; ?> </td>
                <td>
                    <div class="rating-result"><?php
                        $i = 1;
                        while ($i <= $value['rating']) {
                            echo '<span class="active"></span>';
                            $i++;
                        } ?> </div>
                </td>
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