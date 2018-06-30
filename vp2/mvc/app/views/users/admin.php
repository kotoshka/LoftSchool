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
                <li><a href="/users/profile">Профиль пользователя</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    <div style="color: red; text-align: center"><?= $data['error'] ?></div>
    <?php if (empty($_SESSION['id'])) : ?>
        <h1>
            <div style="color: green; text-align: center">Необходимо <a href="/users/authorize">авторизоваться</a> на
                сайте
            </div>
        </h1>
    <?php elseif ($_SESSION['id'] != ADMIN_ID) : ?>
        <h1>Раздел доступен только администратору сайта.</h1>
    <?php else : ?>
        <?php if (!empty($_GET['edit'])) : ?>
            <h1>Редактирование пользователя id = <?= $data['user']['id'] ?></h1>
            <a href="/users/admin/">Вернуться к списку</a>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="edit" value="<?= $_GET['edit'] ?>">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" name="login" class="form-control" id="" placeholder="Логин"
                               value="<?= $data['user']['login'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3"
                               placeholder="Пароль" value="">
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
                    <label for="" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id=""
                               placeholder="Пароль" value="<?= $data['user']['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="" placeholder="Имя"
                               value="<?= $data['user']['name'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Описание</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" id=""
                               placeholder="Описание" value="<?= $data['user']['description'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Возраст</label>
                    <div class="col-sm-10">
                        <input type="text" name="age" class="form-control" id=""
                               placeholder="Возраст" value="<?= $data['user']['age'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <img width="200px" src="/upload/<?= $data['user']['photo'] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Аватар</label>
                    <div class="col-sm-10">
                        <input type="file" name="photo" class="form-control" id=""
                               placeholder="Аватар">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Сохранить</button>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <button class="js-add-btn" style="margin:20px 0">Добавить пользователя</button>
            <div class="js-add-form" style="display: none">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="create" value="y">
                    <div class="form-group">
                        <label for="123" class="col-sm-2 control-label">Логин</label>
                        <div class="col-sm-10">
                            <input type="text" name="login" class="form-control" id="123" placeholder="Логин"
                                   value="<?= $data['login'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1233" class="col-sm-2 control-label">Пароль</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword1233"
                                   placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1234" class="col-sm-2 control-label">Пароль (Повтор)</label>
                        <div class="col-sm-10">
                            <input type="password" name="confirmPass" class="form-control" id="inputPassword1234"
                                   placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="321" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="321"
                                   placeholder="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="3232" class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="3232" placeholder="Имя"
                                   value="<?= $data['name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="3212321" class="col-sm-2 control-label">Описание</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" id="3212321"
                                   placeholder="Описание" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="22222" class="col-sm-2 control-label">Возраст</label>
                        <div class="col-sm-10">
                            <input type="text" name="age" class="form-control" id="22222"
                                   placeholder="Возраст" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="333" class="col-sm-2 control-label">Аватар</label>
                        <div class="col-sm-10">
                            <input type="file" name="photo" class="form-control" id="333"
                                   placeholder="Аватар">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Пользователь(логин)</th>
                    <th>Имя</th>
                    <th>возраст
                        <?php
                        if ($_GET['order'] === 'asc') : ?>
                            <a href="/users/admin/?order=desc"><span class="glyphicon glyphicon-arrow-up"></span></a>
                        <?php else : ?>
                            <a href="/users/admin/?order=asc"><span class="glyphicon glyphicon-arrow-down"></span></a>
                        <?php endif; ?>
                    </th>
                    <th>описание</th>
                    <th>Фотография</th>
                    <th>Действия</th>
                </tr>
                <?php foreach ($data['users'] as $key => $arUser) : ?>
                    <tr>
                        <td><?= $arUser['login'] ?></td>
                        <td><?= $arUser['name'] ?></td>
                        <td><?= $arUser['age'] ?>
                            <?php if ($arUser['age']) : ?>
                                - <?= ($arUser['age'] >= 18) ? 'Совершеннолетний' : 'Несовершеннолетний' ?>
                            <?php endif; ?>
                        </td>
                        <td><?= $arUser['description'] ?></td>
                        <td>
                            <?php if ($arUser['photo']) : ?>
                                <img width="100px"
                                     src="<?= (strpos($arUser['photo'], 'http') !== false) ? '' : '/upload/' ?><?= $arUser['photo'] ?>"
                                     alt="<?= $arUser['name'] ?>">
                            <?php else : ?>
                                Нет фото
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="/users/admin/?delete=<?= $arUser['id'] ?>">Удалить пользователя</a>
                            <a href="/users/admin/?edit=<?= $arUser['id'] ?>">Редактировать пользователя</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <?php endif ?>


</div><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/bootstrap.min.js"></script>

</body>
</html>
