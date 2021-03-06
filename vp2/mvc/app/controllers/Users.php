<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\File;

class Users extends Main
{
    public function index()
    {
        $order = ($_GET['order'] === 'asc') ? 'asc' : 'desc';

        $data['users'] = User::getList(0, $order);
        $data['users'] = $data['users']->toArray();
        $this->view->render('users/index', $data);
    }

    public function admin()
    {
        $data = [];
        try {
            // create
            if (!empty($_POST['create'])) {
                $data = $this->createUser();
                $data['post'] = [
                    'login' => $_POST['login'],
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                    'age' => $_POST['age'],
                    'description' => $_POST['description'],
                ];
                if (!empty($_FILES)) {
                    $fileName = User::uploadFile($_FILES['photo']);
                    if (!empty($fileName)) {
                        $data['post']['photo'] = $fileName;
                    }
                }
                if (!empty($data['user']['id'])) {
                    User::updateProfile($data['user']['id'], $data['post']);
                }
            }
            // delete
            if (!empty($_REQUEST['delete'])) {
                User::remove($_REQUEST['delete']);
            }
            // update
            if (!empty($_POST['edit'])) {
                $data['post'] = [
                    'login' => $_POST['login'],
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                    'age' => $_POST['age'],
                    'description' => $_POST['description'],
                ];
                if (!empty($_POST['password']) && $_POST['password'] !== $_POST['confirmPass']) {
                    throw new \Exception('Пароли не совпадают!');
                }
                $hash = User::getHash($_POST['password']);
                $data['post']['password'] = $hash;
                if (!empty($_FILES)) {
                    $fileName = User::uploadFile($_FILES['photo']);
                    if (!empty($fileName)) {
                        $data['post']['photo'] = $fileName;
                    }
                }
                User::updateProfile($_GET['edit'], $data['post']);
            }
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }
        if (!empty($_GET['edit'])) {
            $data['user'] = User::getList($_GET['edit']);
            if (empty($data['user'])) {
                $data['error'] = 'Такого пользователя не существует!';
            }
            $data['user'] = $data['user']->toArray();
        } else {
            $order = ($_GET['order'] === 'asc') ? 'asc' : 'desc';
            $data['users'] = User::getList(0, $order);
            $data['users'] = $data['users']->toArray();
        }
        $this->view->render('users/admin', $data);
    }

    public function files()
    {
        $data = [];

        if (!empty($_FILES)) {
            $data = [
                'file' => User::uploadFile($_FILES['file']),
            ];
            File::addFile($_SESSION['id'], $data['file']);
        }
        if (!empty($_GET['delete']) && !empty($_SESSION['id'])) {
            $data['error'] = File::removeFile($_GET['delete'], $_SESSION['id']);
        }

        if (!empty($_SESSION['id'])) {
            $data['files'] = File::getList($_SESSION['id']);
        }
        $this->view->render('users/files', $data);
    }

    public function profile()
    {
        if (!empty($_POST) || !empty($_FILES)) {
            $data['post'] = [
                'login' => $_POST['login'],
                'name' => $_POST['name'],
                'age' => $_POST['age'],
                'description' => $_POST['description'],
            ];
            $fileName = User::uploadFile($_FILES['photo']);
            if (!empty($fileName)) {
                $data['post']['photo'] = $fileName;
            }
            User::updateProfile($_SESSION['id'], $data['post']);
        }
        if (!empty($_SESSION['id'])) {
            $data = User::getList($_SESSION['id']);
            $data = $data->toArray();
        }
        $this->view->render('users/profile', $data);
    }

    public function register()
    {
        $data = $this->createUser();
        $this->view->render('users/register', $data);
    }

    public function createUser()
    {
        try {
            if (!empty($_POST)) {
                if (empty($_POST['password']) || empty($_POST['confirmPass']) || empty($_POST['login']) || empty($_POST['email'])) {
                    throw new \Exception('Все поля должны быть заполнены!');
                }
                if ($_POST['password'] !== $_POST['confirmPass']) {
                    throw new \Exception('Пароли не совпадают!');
                }
                if (User::isExist($_POST['login'])) {
                    throw new \Exception('Пользователь с таким логином уже существует!');
                }
                if (User::checkEmail($_POST['email'])) {
                    throw new \Exception('Пользователь с таким email уже существует!');
                }
                $data['user'] = User::register($_POST['login'], $_POST['password'], $_POST['email']);
                $data['success'] = $data['user']['login'] . ', Вы успешно зарегистрированы!';
                if (empty($_SESSION['id'])) {
                    $_SESSION['id'] = $data['user']['id'];
                }
            }
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }
        return $data;
    }

    public function authorize()
    {
        $data = [];
        try {
            if (!empty($_POST)) {
                if (empty($_POST['password']) || empty($_POST['login'])) {
                    throw new \Exception('Все поля должны быть заполнены!');
                }
                $arUser = User::isExist($_POST['login']);
                if (!$arUser) {
                    throw new \Exception('Неверный логин!');
                }
                if (!User::checkPass($arUser['id'], $_POST['password'])) {
                    throw new \Exception('Неверный пароль!');
                }
                $data['success'] = $arUser['login'] . ', Вы успешно авторизованы!';
                $_SESSION['id'] = $arUser['id'];
            }
        } catch (\Exception $e) {
            $data['error'] = $e->getMessage();
        }
        $this->view->render('users/authorize', $data);
    }

    public function logout()
    {
        unset($_SESSION['id']);
        header('Location: /users/authorize');
    }

    public function delete()
    {
        if (!empty($_SESSION['id'])) {
            User::remove($_REQUEST['id']);
        }
        header('Location: /users/index');
    }

    public function fake()
    {
        if (!empty($_GET['fake'])) {
            $_GET['fake'] = (int)$_GET['fake'];
            User::fake($_GET['fake']);
        }
        $this->view->render('users/fake');
    }
}
