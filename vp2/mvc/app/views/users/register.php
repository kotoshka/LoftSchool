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
                <li class="active"><a href="/users/register">Регистрация</a></li>
                <li><a href="/users/index">Список пользователей</a></li>
                <li><a href="/users/files">Список файлов</a></li>
                <li><a href="/users/profile">Профиль пользователя</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div style="color: red; text-align: center"><?= $data['error'] ?></div>
<?print_r($_SESSION['id'])?>
<div class="container">
    <div class="form-container">
        <?php if (empty($_SESSION['id'])) : ?>
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Логин">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" placeholder="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3"
                               placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
                    <div class="col-sm-10">
                        <input type="password" name="confirmPass" class="form-control" id="inputPassword4"
                               placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                        <br><br>
                        Зарегистрированы? <a href="/users/authorize">Авторизируйтесь</a>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <div style="color: green; text-align: center">
                <?= $data['success'] ?
                    $data['success'] :
                    'Вы уже авторизованы на сайте. <a href="/users/logout">Выйти</a>' ?>
            </div>
        <?php endif; ?>
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
