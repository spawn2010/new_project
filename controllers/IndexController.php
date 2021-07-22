<?php

class IndexController extends Controller
    {
    private $pageTpl = '/views/indexView.php';

    public function __construct()
        {
        $this->model = new IndexModel();
        $this->view = new View();
        $this->beforeAction();
        }

    public function index()
        {
        $this->pageData['title'] = "Вход в личный кабинет";
        if ($_POST['add'])
            {
            if ($_POST['login'] && $_POST['password'] != '')
                {
                $login = $_POST['login'];
                $pass = md5($_POST['password']);
                $this->model->addUser($login, $pass);
                $this->pageData['error'] = "Вы успешно зарегестрированы";
                } else
                {
                $this->pageData['error'] = "Введите логин и пароль";
                }
            }
        if (!empty($_POST['check']))
            {
            $login = $_POST['login'];
            $pass = md5($_POST['password']);
            if ($this->model->checkUser($login, $pass))
                {
                $this->pageData['error'] = "Неправильный логин или пароль";
                } else
                {
                $this->redirect('/problem');
                }
            }
        $this->view->render($this->pageTpl, $this->pageData);
        }

    public function beforeAction()
        {
        if ($_SESSION['user'])
            {
            $this->redirect('/problem');
            }
        }

    public function logout()
        {
        session_start();
        session_destroy();
        $this->redirect('/');
        exit;
        }
    }

?>