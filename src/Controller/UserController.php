<?php

namespace app\Controller;

use app\Core\Controller;
use app\Model\UserModel;
use app\Core\View;
use Doctrine\DBAL\Exception;

class UserController extends Controller
{

    private string $pageTpl = '/views/indexView.php';

    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
        $this->view = new View();
        $this->beforeAction();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $this->pageData['title'] = "Вход в личный кабинет";
        if ($_POST['add']) {
            if ($_POST['login'] && $_POST['pass'] !== '') {
                $data = $_POST;
                array_pop($data);
                $data['name'] = 'user';
                if ($_POST['login'] === 'user 2') {
                    $data['name'] = 'admin';
                }
                $this->model->addUser($data);
                $this->pageData['error'] = "Вы успешно зарегестрированы";
            } else {
                $this->pageData['error'] = "Введите логин и пароль";
            }
        }
        if (!empty($_POST['check'])) {
            $login = $_POST['login'];
            $pass = md5($_POST['pass']);
            if (empty($this->model->get($login, $pass))) {
                $this->pageData['error'] = "Неправильный логин или пароль";
            } else {
                $_SESSION['auth'] = $this->model->get($login, $pass);
                $this->redirect('/problem');
            }
        }
        $this->view->render($this->pageTpl, $this->pageData);
    }


    public function beforeAction(): void
    {
        if (isset($_SESSION['auth'])) {
            $this->redirect('/problem');
        }
    }


    public function logout(): void
    {
        session_start();
        session_destroy();
        $this->redirect('/');
        exit;
    }
}

