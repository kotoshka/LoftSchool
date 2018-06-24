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
    <title>Starter Template for Bootstrap</title>
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
                <li><a href="/users/files">Список файлов</a></li>
                <li class="active"><a href="/users/profile">Профиль пользователя</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div style="color: red; text-align: center"><?= $data['error'] ?></div>
<div class="container">
    <div class="form-container">
        <? if (!empty($_SESSION['id'])) : ?>

            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" name="login" class="form-control" id="" placeholder="Логин" value="<?=$data['login']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="" placeholder="Имя" value="<?=$data['name']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Описание</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" id=""
                               placeholder="Описание" value="<?=$data['description']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Возраст</label>
                    <div class="col-sm-10">
                        <input type="text" name="age" class="form-control" id=""
                               placeholder="Возраст" value="<?=$data['age']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Аватар</label>
                    <div class="col-sm-10">
                        <input type="file" name="photo" class="form-control" id=""
                               placeholder="Аватар" >
                    </div>
                </div>
                <div class="form-group">
                    <img width="200px" src="/upload/<?=$data['photo']?>">
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Сохранить</button>
                    </div>
                </div>
            </form>
        <? else : ?>
            <div style="color: green; text-align: center">Необходимо <a href="/users/authorize">авторизоваться</a> на сайте</div>
        <? endif; ?>
    </div>
</div><!-- /.container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
