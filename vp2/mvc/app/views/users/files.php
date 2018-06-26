<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Список файлов</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/starter-template.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/users/authorize">Авторизация</a></li>
                <li><a href="/users/register">Регистрация</a></li>
                <li><a href="/users/index">Список пользователей</a></li>
                <li class="active"><a href="/users/files">Список файлов</a></li>
                <li><a href="/users/profile">Профиль пользователя</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    <?php if (empty($_SESSION['id'])) : ?>
        <h1>Запретная зона, доступ только авторизированному пользователю</h1>
        <!--    <h2>Информация выводится из списка файлов</h2>-->
    <?php else : ?>
        <div style="color: red; text-align: center"><?= $data['error'] ?></div>
        <table class="table table-bordered">
            <tr>
                <th>Название файла</th>
                <th>Фотография</th>
                <th>Действия</th>
            </tr>
            <?php foreach ($data['files'] as $arFile) : ?>
                <tr>
                    <td><?= $arFile['name'] ?></td>
                    <td>
                        <img width="100px"
                             src="<?=(strpos($arFile['name'], 'http') !== false) ? '' : '/upload/' ?><?= $arFile['name'] ?>"
                             alt="<?= $arFile['name'] ?>">
                    </td>
                    <td>
                        <a href="/users/files/?delete=<?= $arFile['id'] ?>">Удалить файл пользователя</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h2>Добавить файл:</h2>
        <form class="form-horizontal" action="/users/files/" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">Файл</label>
                <div class="col-sm-10">
                    <input type="file" name="file" class="form-control" id=""
                           placeholder="Файл">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </form>
    <?php endif; ?>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/bootstrap.min.js"></script>

</body>
</html>
